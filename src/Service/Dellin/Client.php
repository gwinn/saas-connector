<?php

/**
 * PHP version 7.1
 *
 * @category Dellin
 * @package  SaaS\Service\Dellin
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin;

use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use SaaS\Service\Dellin\Exception\DellinApiException;
use SaaS\Service\Dellin\Model;
use SaaS\Service\Dellin\Model\Response\Response;

/**
 * @category Dellin
 * @package  SaaS\Service\Dellin
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class Client
{
    public const CONFIG = [
        'base_uri' => 'https://api.dellin.ru',
        'http_errors' => false,
        'headers'  => [
            'Content-type' => 'application/json',
            'Accept' => 'application/json',
            'Cache-Control' =>'no-cache'
        ],
    ];

    /**
     * @var string
     */
    protected $appKey;

    /**
     * @var string|null
     */
    protected $login;

    /**
     * @var string|null
     */
    protected $password;

    /**
     * @var string|null
     */
    protected $sessionId;

    /**
     * @var bool
     */
    protected $sessionRenew;

    /**
     * @var \DateTime|false|null
     */
    protected $sessionExpireTime;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * Client constructor.
     *
     * @param string $appKey Application key
     * @param string|null $login Login for personal account at dellin.ru
     * @param string|null $password Password for personal account at dellin.ru
     * @param bool $sessionRenew Auto renew session
     */
    public function __construct(string $appKey, string $login = null, string $password = null, bool $sessionRenew = false)
    {
        $this->appKey = $appKey;
        $this->login = $login;
        $this->password = $password;
        $this->sessionRenew = $sessionRenew;
        $this->client = new \GuzzleHttp\Client(self::CONFIG);

        $serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(
                new SerializedNameAnnotationStrategy(
                    new IdenticalPropertyNamingStrategy()
                )
            )
            ->build()
        ;

        if ($serializer instanceof Serializer) {
            $this->serializer = $serializer;
        }
    }

    /**
     * @return \GuzzleHttp\Client
     */
    public function getClient(): \GuzzleHttp\Client
    {
        return $this->client;
    }

    /**
     * @param \GuzzleHttp\Client $client
     *
     * @return Client
     */
    public function setClient(\GuzzleHttp\Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function isSessionExpired(): bool
    {
        if (null === $this->sessionId) {
            return true;
        }

        if (null === $this->sessionExpireTime) {
            $response = $this->getSessionInfo()->getResponse();

            if ($response instanceof Model\Response\Customers\SessionInfoResponse) {
                $this->sessionExpireTime = \DateTime::createFromFormat('Y-m-d H:i', $response->session->expireTime);
            }
        }

        return (new \DateTime()) > $this->sessionExpireTime;
    }

    /**
     * @link https://dev.dellin.ru/api/auth/login/#_header2
     *
     * @group customers
     *
     * @param string $login Login for personal account at dellin.ru
     * @param string $password Password for personal account at dellin.ru
     *
     * @return Response
     */
    public function login(string $login, string $password): Response
    {
        $body = json_encode(array_merge($this->getDefaultParameters(), ['login' => $login, 'password' => $password]));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        $response = new Response(
            $this->client->post(
                '/v1/customers/login.json',
                [
                    'body' => $body,
                ]
            ),
            Model\Response\Customers\LoginResponse::class
        );

        if ($response->getResponse() instanceof Model\Response\Customers\LoginResponse) {
            $this->sessionId = $response->getResponse()->sessionId;
        }

        return $response;
    }

    /**
     * @link https://dev.dellin.ru/api/auth/login/#_header11
     *
     * @group customers
     *
     * @return Response
     */
    public function logout(): Response
    {
        $body = json_encode($this->getDefaultParameters(true));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return new Response(
            $this->client->post(
                '/v1/customers/logout.json',
                [
                    'body' => $body,
                ]
            ),
            Model\Response\Customers\LogoutResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/auth/login/#_header18
     *
     * @group customers
     *
     * @return Response
     */
    public function getSessionInfo(): Response
    {
        $body = json_encode($this->getDefaultParameters(true));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return new Response(
            $this->client->post(
                '/v1/customers/session_info.json',
                [
                    'body' => $body,
                ]
            ),
            Model\Response\Customers\SessionInfoResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/auth/counteragents
     *
     * @group customers
     *
     * @param string|null $cauid UID of the counterparty that needs to be chosen in order
     * @param bool $fullInfo Flag for requesting full information about all available counterparties
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function getAvailableCounteragents(string $cauid = null, bool $fullInfo = false): Response
    {
        $parameters = [];

        if (isset($cauid)) {
            $parameters['cauid'] = $cauid;
        }

        if ($fullInfo) {
            $parameters['full_info'] = $fullInfo;
        }

        $body = json_encode(array_merge($this->getDefaultParameters(true), $parameters));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/customers/counteragents.json',
            $body,
            Model\Response\Customers\AvailableCounteragentListResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/calculation/pickup/#_header2
     *
     * @group calculator
     *
     * @param Model\Request\Calculator\CalculateRequest $request
     *
     * @return Response
     *
     * @throws DellinApiException
     *
     * @deprecated
     */
    public function calculate(Model\Request\Calculator\CalculateRequest $request): Response
    {
        $body = json_encode(array_merge($this->getDefaultParameters(true), $this->serializer->toArray($request)));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/public/calculator.json',
            $body,
            Model\Response\Calculator\CalculateResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/calculation/calculator/#_header8
     *
     * @group calculator
     *
     * @param Model\Request\Calculator\CalculateRequestV2 $request
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function calculateV2(Model\Request\Calculator\CalculateRequestV2 $request): Response
    {
        $body = json_encode(array_merge($this->getDefaultParameters(true), $this->serializer->toArray($request)));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v2/calculator.json',
            $body,
            Model\Response\Calculator\V2\CalculateResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/ordering/request_v2/
     *
     * @group request
     *
     * @param Model\Request\Delivery\DeliveryRequest $request
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function createDelivery(Model\Request\Delivery\DeliveryRequest $request): Response
    {
        $body = json_encode(array_merge($this->getDefaultParameters(true), $this->serializer->toArray($request)));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v2/request.json',
            $body,
            Model\Response\Delivery\DeliveryResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/orders/search
     *
     * @group orders
     *
     * @param Model\Request\Order\OrderRequest $request
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function getOrders(Model\Request\Order\OrderRequest $request): Response
    {
        $body = json_encode(array_merge($this->getDefaultParameters(true), $this->serializer->toArray($request)));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v3/orders.json',
            $body,
            Model\Response\Order\OrderListResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/orders/print/#_header2
     *
     * @group orders
     *
     * @param string $docUid
     * @param string $mode (bill | order | invoice)
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function getPrintPlate(string $docUid, string $mode): Response
    {
        $body = json_encode(array_merge($this->getDefaultParameters(true), ['docUid' => $docUid, 'mode' => $mode]));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/customers/orders/printable.json',
            $body,
            Model\Response\Order\OrderPrintPlateResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/orders/print/#_header16
     *
     * @group orders
     *
     * @param string $requestId
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function getShipmentPrintPlate(string $requestId): Response
    {
        $body = json_encode(array_merge($this->getDefaultParameters(true), ['requestID' => $requestId]));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/customers/request/pdf.json',
            $body,
            Model\Response\Order\ShipmentPrintPlateResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/orders/tracker
     *
     * @group tracker
     *
     * @param Model\Request\Tracker\TrackRequest $request
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function track(Model\Request\Tracker\TrackRequest $request): Response
    {
        $body = json_encode(array_merge($this->getDefaultParameters(true), $this->serializer->toArray($request)));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v2/public/tracker.json',
            $body,
            Model\Response\Tracker\TrackResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/book/counteragents/#_header2
     *
     * @group customers-book
     *
     * @param bool $withAnonym Flag for getting the list of counterparties with/without anonymous receivers
     * @param bool $isAnonym Flag for getting the list of counterparties including only anonymous receivers
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function getCounteragents(bool $withAnonym = false, bool $isAnonym = false): Response
    {
        $parameters = [];

        if ($withAnonym) {
            $parameters['withAnonym'] = $withAnonym;
        }

        if ($isAnonym) {
            $parameters['isAnonym'] = $isAnonym;
        }

        $body = json_encode(array_merge($this->getDefaultParameters(), $parameters));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/customers/book/counteragents.json',
            $body,
            Model\Response\Book\CounteragentListResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/book/counteragents/#_header9
     *
     * @group customers-book
     *
     * @param Model\Request\Book\CounteragentRequest $request
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function setCounteragent(Model\Request\Book\CounteragentRequest $request): Response
    {
        $body = json_encode(array_merge($this->getDefaultParameters(true), $this->serializer->toArray($request)));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/customers/book/counteragents/update.json',
            $body,
            Model\Response\Book\CounteragentResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/book/contact-details/#_header2
     *
     * @group customers-book
     *
     * @param string $addressId
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function getContactDetails(string $addressId): Response
    {
        $body = json_encode(array_merge($this->getDefaultParameters(), ['addressID' => $addressId]));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/customers/book/address.json',
            $body,
            sprintf('array<%s>', Model\Response\Book\ContactDetailsResponse::class)
        );
    }

    /**
     * @link https://dev.dellin.ru/api/book/contact-details/#_header10
     *
     * @group customers-book
     *
     * @param string $addressId
     * @param string $contact
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function createContact(string $addressId, string $contact): Response
    {
        $body = json_encode(array_merge($this->getDefaultParameters(), ['addressID' => $addressId, 'contact' => $contact]));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/customers/book/contacts/update.json',
            $body,
            Model\Response\Book\ContactResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/book/contact-details/#_header19
     *
     * @group customers-book
     *
     * @param string $personId
     * @param string $contact
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function editContact(string $personId, string $contact): Response
    {
        $body = json_encode(array_merge($this->getDefaultParameters(), ['personID' => $personId, 'contact' => $contact]));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/customers/book/contacts/update.json',
            $body,
            Model\Response\Book\ContactResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/book/contact-details/#_header24
     *
     * @group customers-book
     *
     * @param string $addressId
     * @param string $phoneNumber
     * @param string|null $addNumber
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function createPhone(string $addressId, string $phoneNumber, string $addNumber = null): Response
    {
        $parameters = [
            'addressID' => $addressId,
            'phoneNumber' => $phoneNumber,
        ];

        if (isset($addNumber)) {
            $parameters['addNumber'] = $addNumber;
        }

        $body = json_encode(array_merge($this->getDefaultParameters(), $parameters));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/customers/book/phones/update.json',
            $body,
            Model\Response\Book\PhoneResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/book/contact-details/#_header34
     *
     * @group customers-book
     *
     * @param string $phoneId
     * @param string $phoneNumber
     * @param string|null $addNumber
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function editPhone(string $phoneId, string $phoneNumber, string $addNumber = null): Response
    {
        $parameters = [
            'phoneID' => $phoneId,
            'phoneNumber' => $phoneNumber,
        ];

        if (isset($addNumber)) {
            $parameters['addNumber'] = $addNumber;
        }

        $body = json_encode(array_merge($this->getDefaultParameters(), $parameters));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/customers/book/phones/update.json',
            $body,
            Model\Response\Book\PhoneResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/book/addresses/#_header2
     *
     * @group customers-book
     *
     * @param string $counteragentId
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function getAddresses(string $counteragentId): Response
    {
        $body = json_encode(array_merge($this->getDefaultParameters(true), ['counteragentID' => $counteragentId]));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/customers/book/addresses.json',
            $body,
            sprintf('array<%s>', Model\Response\Book\AddressResponse::class)
        );
    }

    /**
     * @link https://dev.dellin.ru/api/book/addresses/#_header10
     *
     * @group customers-book
     *
     * @param string $counteragentId
     * @param Model\Request\Book\Address $address
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function createAddress(string $counteragentId, Model\Request\Book\Address $address): Response
    {
        $body = json_encode(array_merge(
            $this->getDefaultParameters(true),
            ['counteragentID' => $counteragentId],
            $this->serializer->toArray($address)
        ));

        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/customers/book/addresses/update.json',
            $body,
            Model\Response\Book\UpdateAddressResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/book/addresses/#_header23
     *
     * @group customers-book
     *
     * @param string $addressId
     * @param string $house
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function editAddress(string $addressId, string $house): Response
    {
        $body = json_encode(array_merge($this->getDefaultParameters(true), ['addressID' => $addressId, 'house' => $house]));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/customers/book/addresses/update.json',
            $body,
            Model\Response\Book\UpdateAddressResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/catalogs/request_info/#_header1
     *
     * @group references
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function getServices(): Response
    {
        $body = json_encode($this->getDefaultParameters());
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/references/services.json',
            $body,
            Model\Response\Reference\ServiceListResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/catalogs/request_info/#_header11
     *
     * @group references
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function getPackages(): Response
    {
        $body = json_encode($this->getDefaultParameters());
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/references/packages.json',
            $body,
            Model\Response\Reference\PackageListResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/catalogs/packages_available
     *
     * @group references
     *
     * @param Model\Request\Reference\AvailablePackageRequest $request
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function getAvailablePackages(Model\Request\Reference\AvailablePackageRequest $request): Response
    {
        $body = json_encode(array_merge($this->getDefaultParameters(), $this->serializer->toArray($request)));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/public/packages_available.json',
            $body,
            Model\Response\Reference\AvailablePackageListResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/catalogs/request_info/#_header20
     *
     * @group references
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function getRequestServices(): Response
    {
        $body = json_encode($this->getDefaultParameters());
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/public/request_services.json',
            $body,
            Model\Response\Reference\RequestServicesResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/catalogs/request_info/#_header27
     *
     * @group references
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function getRequestDeliveryTypes(): Response
    {
        $body = json_encode($this->getDefaultParameters());
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/public/request_delivery_types.json',
            $body,
            Model\Response\Reference\RequestDeliveryTypesResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/catalogs/request_info/#_header34
     *
     * @group references
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function getPayerTypes(): Response
    {
        $body = json_encode($this->getDefaultParameters());
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/public/payer_types.json',
            $body,
            Model\Response\Reference\PayerTypesResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/catalogs/request_info/#_header41
     *
     * @group references
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function getPaymentTypes(): Response
    {
        $body = json_encode($this->getDefaultParameters());
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/public/payment_types.json',
            $body,
            Model\Response\Reference\PaymentTypesResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/catalogs/request_info/#_header48
     *
     * @group references
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function getLoadTypes(): Response
    {
        $body = json_encode($this->getDefaultParameters());
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/references/load_types.json',
            $body,
            Model\Response\Reference\LoadTypesResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/catalogs/request_info/#_header56
     *
     * @group references
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function getLoadParams(): Response
    {
        $body = json_encode($this->getDefaultParameters());
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/public/load_params.json',
            $body,
            Model\Response\Reference\LoadParamsResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/catalogs/pvz
     *
     * @group references
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function getTerminals(): Response
    {
        $body = json_encode($this->getDefaultParameters());
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v3/public/terminals.json',
            $body,
            Model\Response\Reference\TerminalListResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/catalogs/terminaly-po-napravleniju/
     *
     * @group references
     *
     * @param string|null $code
     * @param string|null $cityId
     * @param string|null $direction
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function getRequestTerminals(string $code = null, string $cityId = null, string $direction = null): Response
    {
        $parameters = [];

        if (isset($code)) {
            $parameters['code'] = $code;
        } elseif (isset($cityId)) {
            $parameters['cityID'] = $cityId;
        }

        if (isset($direction)) {
            $parameters['direction'] = $direction;
        }

        $body = json_encode(array_merge($this->getDefaultParameters(), $parameters));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/public/request_terminals.json',
            $body,
            Model\Response\Reference\RequestTerminalsResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/catalogs/misc/#_header2
     *
     * @group references
     *
     * @param string|null $title
     * @param string|null $name
     * @param string|null $countryUid
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function getOpfList(string $title = null, string $name = null, string $countryUid = null): Response
    {
        $parameters = [];

        if (isset($title)) {
            $parameters['title'] = $title;
        } elseif (isset($name)) {
            $parameters['name'] = $name;
        }

        if (isset($countryUid)) {
            $parameters['countryUID'] = $countryUid;
        }

        $body = json_encode(array_merge($this->getDefaultParameters(), $parameters));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/references/opf_list.json',
            $body,
            Model\Response\Reference\OpfListResponse::class
        );
    }

    /**
     * @link https://dev.dellin.ru/api/catalogs/harakter-gruza-po-vvedennoj-stroke/#_header2
     *
     * @group references
     *
     * @param string|null $name
     * @param int|null $page
     *
     * @return Response
     *
     * @throws DellinApiException
     */
    public function getFreightTypes(string $name = null, int $page = null): Response
    {
        $parameters = [
            'name' => $name,
        ];

        if (isset($page)) {
            $parameters['page'] = $page;
        }

        $body = json_encode(array_merge($this->getDefaultParameters(), $parameters));
        if (false === $body) {
            throw new DellinApiException([json_last_error_msg()]);
        }

        return $this->doRequest(
            '/v1/public/freight_types/search.json',
            $body,
            Model\Response\Reference\FreightTypesResponse::class
        );
    }

    protected function getDefaultParameters(bool $useSession = false): array
    {
        $parameters = [
            'appkey' => $this->appKey,
        ];

        if ($useSession && isset($this->sessionId)) {
            $parameters['sessionID'] = $this->sessionId;
        }

        return $parameters;
    }

    protected function doRequest(string $uri, string $body, string $className, bool $useSession = false): Response
    {
        if ($useSession && $this->isSessionExpired()) {
            if (!$this->sessionRenew) {
                throw new DellinApiException(['Session is expired.']);
            }

            $this->login($this->login ?? '', $this->password ?? '');
        }

        return new Response($this->client->post($uri, ['body' => $body]), $className);
    }
}

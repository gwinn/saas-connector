<?php

/**
 * PHP version 7.1
 *
 * @category Insales
 * @package  SaaS\Service
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service;

use GuzzleHttp;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use SaaS\Service\Insales\Model;
use SaaS\Service\Insales\Model\Request;
use SaaS\Service\Insales\Model\Response;
use SaaS\Service\Insales\Exception;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\ValidatorBuilder;

/**
 * Class Insales
 *
 * @category Insales
 * @package  SaaS\Service
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class Insales
{
    /* @var GuzzleHttp\Client $client */
    protected $client;

    /* @var Serializer $serializer */
    protected $serializer;

    /* @var ValidatorInterface $validator */
    protected $validator;

    const CONFIG = [
        'http_errors' => false,
        'headers'  => [
            'Content-type' => 'application/json',
            'Accept' => 'application/json',
            'Cache-Control' =>'no-cache'
        ],
    ];

    /**
     * Insales constructor.
     *
     * @param string $apiKey   api key value
     * @param string $password password value
     * @param string $domain   InSales internal domain
     */
    public function __construct($apiKey, $password, $domain)
    {
        $this->client = new GuzzleHttp\Client(
            array_merge(self::CONFIG, ['base_uri' => $domain, 'auth' => [$apiKey, $password]])
        );

        $validator = new ValidatorBuilder();
        $this->validator = $validator->getValidator();

        $this->serializer = SerializerBuilder::create()->setPropertyNamingStrategy(
            new SerializedNameAnnotationStrategy(
                new IdenticalPropertyNamingStrategy()
            )
        )->build();
    }

    /**
     * Get account
     *
     * @link    http://api.insales.ru/?doc_format=JSON#account-get-account-json
     * @group   account
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function accountGet()
    {
        $url = '/admin/account.json';

        return new Response\Response($this->client->get($url), Model\Account::class);
    }

    /**
     * Update account
     *
     * @link    http://api.insales.ru/?doc_format=JSON#account-update-account-json
     * @param   Request\AccountRequest $request account data
     * @group   account
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function accountUpdate(Request\AccountRequest $request)
    {
        $url = '/admin/account.json';
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->put($url, $options), Response\StatusResponse::class);
    }

    /**
     * Get application actions list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#applicationaction-get-application-actions-json
     * @group   application_actions
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationActionsList()
    {
        $url = '/admin/application_actions.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\ApplicationAction::class)
        );
    }

    /**
     * Get application action
     *
     * @link    http://api.insales.ru/?doc_format=JSON#applicationaction-get-application-actions-json
     * @group   application_actions
     *
     * @param int $actionId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationActionGet($actionId)
    {
        $url = sprintf('/admin/application_actions/%s.json', $actionId);

        return new Response\Response($this->client->get($url), Model\ApplicationAction::class);
    }

    /**
     * Create application action
     *
     * @link    http://api.insales.ru/?doc_format=JSON#applicationaction-create-application-action-json
     * @param   Request\ApplicationActionRequest $request application actions data
     * @group   application_actions
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationActionCreate(Request\ApplicationActionRequest $request)
    {
        $url = '/admin/application_actions.json';
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->post($url, $options), Model\ApplicationAction::class);
    }

    /**
     * Update application action
     *
     * @link    http://api.insales.ru/?doc_format=JSON#applicationaction-update-application-action-json
     * @param   Request\ApplicationActionRequest $request application actions data
     * @group   application_actions
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationActionUpdate(Request\ApplicationActionRequest $request)
    {
        $url = sprintf('/admin/application_actions/%s.json', $request->getApplicationAction()->getId());
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->put($url, $options), Model\ApplicationAction::class);
    }

    /**
     * Delete application action
     *
     * @link  http://api.insales.ru/?doc_format=JSON#applicationaction-destroy-application-action-json
     * @param int $actionId
     * @group application_actions
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationActionDelete($actionId)
    {
        $url = sprintf('/admin/application_actions/%s.json', $actionId);

        return new Response\Response($this->client->delete($url), Response\StatusResponse::class);
    }

    /**
     * Get application charge list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#applicationaction-get-application-actions-json
     * @group   application_charges
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationChargesList()
    {
        $url = '/admin/application_charges.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\ApplicationCharge::class)
        );
    }

    /**
     * Get application charge
     *
     * @link   http://api.insales.ru/?doc_format=JSON#applicationaction-get-application-actions-json
     * @group  application_charges
     *
     * @param  int $chargeId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationChargeGet($chargeId)
    {
        $url = sprintf('/admin/application_charges/%s.json', $chargeId);

        return new Response\Response($this->client->get($url), Model\ApplicationCharge::class);
    }

    /**
     * Create application charge
     *
     * @link    http://api.insales.ru/?doc_format=JSON#applicationaction-create-application-action-json
     * @param   Request\ApplicationChargeRequest $request application actions data
     * @group   application_charges
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationChargeCreate(Request\ApplicationChargeRequest $request)
    {
        $url = '/admin/application_charges.json';
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->post($url, $options), Model\ApplicationCharge::class);
    }

    /**
     * Update application charge
     *
     * @link    http://api.insales.ru/?doc_format=JSON#applicationaction-update-application-action-json
     * @param   Request\ApplicationChargeRequest $request application actions data
     * @group   application_charges
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationChargeUpdate(Request\ApplicationChargeRequest $request)
    {
        $url = sprintf('/admin/application_charges/%s.json', $request->getApplicationCharge()->getId());
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->put($url, $options), Model\ApplicationCharge::class);
    }

    /**
     * Delete application charge
     *
     * @link  http://api.insales.ru/?doc_format=JSON#applicationaction-destroy-application-action-json
     * @param int $chargeId
     * @group application_charges
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationChargeDecline($chargeId)
    {
        $url = sprintf('/admin/application_charges/%s.json', $chargeId);

        return new Response\Response($this->client->post($url), Model\ApplicationCharge::class);
    }

    /**
     * Get application widgets list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#applicationwidget-get-application-widgets-json
     * @group   application_widgets
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationWidgetsList()
    {
        $url = '/admin/application_widgets.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\ApplicationWidget::class)
        );
    }

    /**
     * Get application widget
     *
     * @link    http://api.insales.ru/?doc_format=JSON#applicationwidget-get-application-widget-json
     * @group   application_widgets
     *
     * @param int $widgetId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationWidgetGet($widgetId)
    {
        $url = sprintf('/admin/application_widgets/%s.json', $widgetId);

        return new Response\Response($this->client->get($url), Model\ApplicationWidget::class);
    }

    /**
     * Create application widget
     *
     * @link    http://api.insales.ru/?doc_format=JSON#applicationwidget-create-application-widget-json
     * @param   Request\ApplicationWidgetRequest $request application widget data
     * @group   application_widgets
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationWidgetCreate(Request\ApplicationWidgetRequest $request)
    {
        $url = '/admin/application_widgets.json';
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->post($url, $options), Model\ApplicationWidget::class);
    }

    /**
     * Update application widget
     *
     * @link    http://api.insales.ru/?doc_format=JSON#applicationwidget-update-application-widget-json
     * @param   Request\ApplicationWidgetRequest $request application widget data
     * @group   application_widgets
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationWidgetUpdate(Request\ApplicationWidgetRequest $request)
    {
        $url = sprintf('/admin/application_widgets/%s.json', $request->getApplicationWidget()->getId());
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->put($url, $options), Model\ApplicationWidget::class);
    }

    /**
     * Delete application widget
     *
     * @link  http://api.insales.ru/?doc_format=JSON#applicationwidget-destroy-application-widget-json
     * @param int $widgetId
     * @group application_widgets
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationWidgetDelete($widgetId)
    {
        $url = sprintf('/admin/application_widgets/%s.json', $widgetId);

        return new Response\Response($this->client->delete($url), Response\StatusResponse::class);
    }

    /**
     * Get categories list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#category-get-categories-json
     * @group   categories
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function categoriesList()
    {
        $url = '/admin/categories.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\Category::class)
        );
    }

    /**
     * Get category
     *
     * @link    http://api.insales.ru/?doc_format=JSON#category-get-category-json
     * @group   categories
     *
     * @param int $categoryId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function categoryGet($categoryId)
    {
        $url = sprintf('/admin/categories/%s.json', $categoryId);

        return new Response\Response($this->client->get($url), Model\Category::class);
    }

    /**
     * Get clients list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#client-get-clients-json
     * @group   clients
     *
     * @param Request\ClientsFilterRequest|null $filter
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function clientsList(?Request\ClientsFilterRequest $filter = null)
    {
        $url = '/admin/clients.json';
        $options = [];

        if ($filter !== null) {
            $options = [$this->serializer->toArray($filter)];
        }

        return new Response\Response(
            $this->client->get($url, $options),
            sprintf('array<%s>', Model\Client::class)
        );
    }

    /**
     * Get clients count
     *
     * @group clients
     *
     * @param Request\ClientsFilterRequest|null $filter
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function clientsCount(?Request\ClientsFilterRequest $filter = null)
    {
        $url = '/admin/clients/count.json';
        $options = [];

        if ($filter !== null) {
            $options = ['query' => $this->serializer->toArray($filter)];
        }

        return new Response\Response($this->client->get($url, $options), Model\Response\CountResponse::class);
    }

    /**
     * Get client
     *
     * @link    http://api.insales.ru/?doc_format=JSON#client-get-client-json
     * @group   clients
     *
     * @param int $clientId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function clientGet($clientId)
    {
        $url = sprintf('/admin/clients/%s.json', $clientId);

        return new Response\Response($this->client->get($url), Model\Client::class);
    }

    /**
     * Create individual or juridical client
     *
     * @link    http://api.insales.ru/?doc_format=JSON#client-create-individual-client-json
     * @link    http://api.insales.ru/?doc_format=JSON#client-create-juridical-client-json
     * @param   Request\ClientRequest $request client data
     * @group   clients
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function clientCreate(Request\ClientRequest $request)
    {
        $url = '/admin/clients.json';
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->post($url, $options), Model\Client::class);
    }

    /**
     * Update client
     *
     * @link    http://api.insales.ru/?doc_format=JSON#client-update-client-json
     * @param   Request\ClientRequest $request client data
     * @group   clients
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function clientUpdate(Request\ClientRequest $request)
    {
        $url = sprintf('/admin/clients/%s.json', $request->getClient()->getId());
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->put($url, $options), Model\Client::class);
    }

    /**
     * Delete client
     *
     * @link  http://api.insales.ru/?doc_format=JSON#client-destroy-client-json
     * @param int $clientId
     * @group clients
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function clientDelete($clientId)
    {
        $url = sprintf('/admin/clients/%s.json', $clientId);

        return new Response\Response($this->client->delete($url), Response\StatusResponse::class);
    }

    /**
     * Get custom statuses list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#customstatus-get-custom-statuses-json
     * @group   custom_statuses
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function customStatusesList()
    {
        $url = '/admin/custom_statuses.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\CustomStatus::class)
        );
    }

    /**
     * Get custom status
     *
     * @link    http://api.insales.ru/?doc_format=JSON#customstatus-get-custom-status-json
     * @group   custom_statuses
     *
     * @param string $permalink
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function customStatusGet($permalink)
    {
        $url = sprintf('/admin/custom_statuses/%s.json', $permalink);

        return new Response\Response($this->client->get($url), Model\CustomStatus::class);
    }

    /**
     * Get delivery variants list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#deliveryvariant-get-delivery-variants-json
     * @group   delivery_variants
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function deliveryVariantsList()
    {
        $url = '/admin/delivery_variants.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\DeliveryVariant::class)
        );
    }

    /**
     * Get delivery variant
     *
     * @link    http://api.insales.ru/?doc_format=JSON#deliveryvariant-get-delivery-variant-json
     * @group   delivery_variants
     *
     * @param int $deliveryVariantId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function deliveryVariantGet($deliveryVariantId)
    {
        $url = sprintf('/admin/delivery_variants/%s.json', $deliveryVariantId);

        return new Response\Response($this->client->get($url), Model\DeliveryVariant::class);
    }

    /**
     * Get domains list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#domain-get-domains-json
     * @group   domains
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function domainsList()
    {
        $url = '/admin/domains.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\Domain::class)
        );
    }

    /**
     * Get domain
     *
     * @link    http://api.insales.ru/?doc_format=JSON#domain-get-domain-json
     * @group   domains
     *
     * @param int $domainId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function domainGet($domainId)
    {
        $url = sprintf('/admin/domains/%s.json', $domainId);

        return new Response\Response($this->client->get($url), Model\Domain::class);
    }

    /**
     * Get fields list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#field-get-fields-json
     * @group   fields
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function fieldsList()
    {
        $url = '/admin/fields.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\Field::class)
        );
    }

    /**
     * Get field
     *
     * @link    http://api.insales.ru/?doc_format=JSON#field-get-field-json
     * @group   fields
     *
     * @param int $fieldId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function fieldGet($fieldId)
    {
        $url = sprintf('/admin/fields/%s.json', $fieldId);

        return new Response\Response($this->client->get($url), Model\Field::class);
    }

    /**
     * Get orders list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#order-get-orders-json
     * @group   orders
     *
     * @param Request\OrdersFilterRequest|null $filter
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function ordersList(?Request\OrdersFilterRequest $filter = null)
    {
        $url = '/admin/orders.json';
        $options = [];

        if ($filter !== null) {
            $options = ['query' => $this->serializer->toArray($filter)];
        }

        return new Response\Response(
            $this->client->get($url, $options),
            sprintf('array<%s>', Model\Order::class)
        );
    }

    /**
     * Get orders count
     *
     * @link  http://api.insales.ru/?doc_format=JSON#order-get-orders-count-json
     * @group orders
     *
     * @param Request\OrdersFilterRequest|null $filter
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function ordersCount(?Request\OrdersFilterRequest $filter = null)
    {
        $url = '/admin/orders/count.json';
        $options = [];

        if ($filter !== null) {
            $options = ['query' => $this->serializer->toArray($filter)];
        }

        return new Response\Response($this->client->get($url, $options), Model\Response\CountResponse::class);
    }

    /**
     * Get order
     *
     * @link    http://api.insales.ru/?doc_format=JSON#order-get-order-json
     * @group   orders
     *
     * @param int $orderId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function orderGet($orderId)
    {
        $url = sprintf('/admin/orders/%s.json', $orderId);

        return new Response\Response($this->client->get($url), Model\Order::class);
    }

    /**
     * Create order
     *
     * @link    http://api.insales.ru/?doc_format=JSON#order-create-order-line-by-product-id-json
     * @link    http://api.insales.ru/?doc_format=JSON#order-create-order-line-by-variant-id-json
     * @param   Request\OrderRequest $request order data
     * @group   orders
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function orderCreate(Request\OrderRequest $request)
    {
        $url = '/admin/orders.json';
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->post($url, $options), Model\Order::class);
    }

    /**
     * Update order
     *
     * @link    http://api.insales.ru/?doc_format=JSON#order-update-order-json
     * @param   Request\OrderRequest $request order data
     * @group   orders
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function orderUpdate(Request\OrderRequest $request)
    {
        $url = sprintf('/admin/orders/%s.json', $request->getOrder()->getId());
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->put($url, $options), Model\Order::class);
    }

    /**
     * Delete order
     *
     * @link  http://api.insales.ru/?doc_format=JSON#order-destroy-order-json
     * @param int $orderId
     * @group orders
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function orderDelete($orderId)
    {
        $url = sprintf('/admin/orders/%s.json', $orderId);

        return new Response\Response($this->client->delete($url), Response\StatusResponse::class);
    }

    /**
     * Get payment gateways list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#paymentgateway-get-payment-gateways-json
     * @group   payment_gateways
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function paymentGatewaysList()
    {
        $url = '/admin/payment_gateways.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\PaymentGateway::class)
        );
    }

    /**
     * Get payment gateway
     *
     * @link    http://api.insales.ru/?doc_format=JSON#paymentgateway-get-payment-gateway-json
     * @group   payment_gateways
     *
     * @param int $paymentGatewayId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function paymentGatewayGet($paymentGatewayId)
    {
        $url = sprintf('/admin/payment_gateways/%s.json', $paymentGatewayId);

        return new Response\Response($this->client->get($url), Model\PaymentGateway::class);
    }

    /**
     * Get products list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#product-get-products-json
     * @group   products
     *
     * @param Request\ProductsFilterRequest|null $filter
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function productsList(?Request\ProductsFilterRequest $filter = null)
    {
        $url = '/admin/products.json';
        $options = [];

        if ($filter !== null) {
            $options = ['query' => $this->serializer->toArray($filter)];
        }

        return new Response\Response(
            $this->client->get($url, $options),
            sprintf('array<%s>', Model\Product::class)
        );
    }

    /**
     * Get products count
     *
     * @link  http://api.insales.ru/?doc_format=JSON#product-get-products-count-json
     * @group products
     *
     * @param Request\ProductsFilterRequest|null $filter
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function productsCount(?Request\ProductsFilterRequest $filter = null)
    {
        $url = '/admin/products/count.json';
        $options = [];

        if ($filter !== null) {
            $options = ['query' => $this->serializer->toArray($filter)];
        }

        return new Response\Response($this->client->get($url, $options), Model\Response\CountResponse::class);
    }

    /**
     * Get product
     *
     * @link    http://api.insales.ru/?doc_format=JSON#product-get-product-json
     * @group   products
     *
     * @param int $productId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function productGet($productId)
    {
        $url = sprintf('/admin/products/%s.json', $productId);

        return new Response\Response($this->client->get($url), Model\Product::class);
    }

    /**
     * Create product
     *
     * @link    http://api.insales.ru/?doc_format=JSON#product-create-product-line-by-product-id-json
     * @link    http://api.insales.ru/?doc_format=JSON#product-create-product-line-by-variant-id-json
     * @param   Request\ProductRequest $request product data
     * @group   products
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function productCreate(Request\ProductRequest $request)
    {
        $url = '/admin/products.json';
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->post($url, $options), Model\Product::class);
    }

    /**
     * Update product
     *
     * @link    http://api.insales.ru/?doc_format=JSON#product-update-product-json
     * @param   Request\ProductRequest $request product data
     * @group   products
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function productUpdate(Request\ProductRequest $request)
    {
        $url = sprintf('/admin/products/%s.json', $request->getProduct()->getId());
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->put($url, $options), Model\Product::class);
    }

    /**
     * Delete product
     *
     * @link  http://api.insales.ru/?doc_format=JSON#product-destroy-product-json
     * @param int $productId
     * @group products
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function productDelete($productId)
    {
        $url = sprintf('/admin/products/%s.json', $productId);

        return new Response\Response($this->client->delete($url), Response\StatusResponse::class);
    }

    /**
     * Get stock currencies list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#stock-currency-get-stock-currencies-json
     * @group   stock_currencies
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function stockCurrenciesList()
    {
        $url = '/admin/stock_currencies.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\StockCurrency::class)
        );
    }

    /**
     * Get stock currency
     *
     * @link    http://api.insales.ru/?doc_format=JSON#stock-currency-get-stock-currency-json
     * @group   stock_currencies
     *
     * @param int $stockCurrencyId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function stockCurrencyGet($stockCurrencyId)
    {
        $url = sprintf('/admin/stock_currencies/%s.json', $stockCurrencyId);

        return new Response\Response($this->client->get($url), Model\StockCurrency::class);
    }

    /**
     * Get variant_fields list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#variantfield-get-variant-fields-json
     * @group   variant_fields
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function variantFieldsList()
    {
        $url = '/admin/variant_fields.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\VariantField::class)
        );
    }

    /**
     * Get field
     *
     * @link    http://api.insales.ru/?doc_format=JSON#variantfield-get-variant-field-json
     * @group   variant_fields
     *
     * @param int $variantFieldId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function variantFieldGet($variantFieldId)
    {
        $url = sprintf('/admin/variant_fields/%s.json', $variantFieldId);

        return new Response\Response($this->client->get($url), Model\VariantField::class);
    }

    /**
     * Get webhooks list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#webhook-get-webhooks-json
     * @group   webhooks
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function webhooksList()
    {
        $url = '/admin/webhooks.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\Webhook::class)
        );
    }

    /**
     * Get webhook
     *
     * @link    http://api.insales.ru/?doc_format=JSON#webhook-get-webhook-json
     * @group   webhooks
     *
     * @param int $webhookId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function webhookGet($webhookId)
    {
        $url = sprintf('/admin/webhooks/%s.json', $webhookId);

        return new Response\Response($this->client->get($url), Model\Webhook::class);
    }

    /**
     * Create webhook
     *
     * @link    http://api.insales.ru/?doc_format=JSON#webhook-create-webhook-json
     * @param   Request\WebhookRequest $request webhook data
     * @group   webhooks
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     * @throws Exception\InsalesApiException
     */
    public function webhookCreate(Request\WebhookRequest $request)
    {
        $url = '/admin/webhooks.json';

        if (empty($request->getWebhook()->getAddress())) {
            throw new Exception\InsalesApiException(
                Exception\InsalesApiException::messageParameterNotFound('address')
            );
        }

        $options = ['body' => $this->serializer->serialize(
            $request,
            'json',
            SerializationContext::create()->setGroups(['create'])
        )];

        return new Response\Response($this->client->post($url, $options), Model\Webhook::class);
    }

    /**
     * Update webhook
     *
     * @link    http://api.insales.ru/?doc_format=JSON#webhook-update-webhook-json
     * @param   Request\WebhookRequest $request webhook data
     * @group   webhooks
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function webhookUpdate(Request\WebhookRequest $request)
    {
        $url = sprintf('/admin/webhooks/%s.json', $request->getWebhook()->getId());
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->put($url, $options), Model\Webhook::class);
    }

    /**
     * Delete webhook
     *
     * @link  http://api.insales.ru/?doc_format=JSON#webhook-destroy-webhook-json
     * @param int $webhookId
     * @group webhooks
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function webhookDelete($webhookId)
    {
        $url = sprintf('/admin/webhooks/%s.json', $webhookId);

        return new Response\Response($this->client->delete($url), Response\StatusResponse::class);
    }
}

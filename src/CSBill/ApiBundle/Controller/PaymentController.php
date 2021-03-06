<?php

/*
 * This file is part of CSBill project.
 *
 * (c) 2013-2015 Pierre du Plessis <info@customscripts.co.za>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CSBill\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations as RestRoute;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class PaymentController extends Controller
{
    /**
     * @ApiDoc(
     *    statusCodes={
     *        200="Returned when successful",
     *        403="Returned when the user is not authorized",
     *        404="Returned when the page is out of range",
     *     },
     *     resource=true,
     *     description="Returns a list of all payments",
     *     authentication=true,
     * )
     *
     * @QueryParam(name="page", requirements="\d+", default="1", description="Current page of listing")
     * @QueryParam(name="limit", requirements="\d+", default="10", description="Number of results to return")
     *
     * @RestRoute\Get(path="/payments")
     *
     * @param ParamFetcherInterface $fetcher
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getPaymentsAction(ParamFetcherInterface $fetcher)
    {
        $repository = $this->get('doctrine.orm.entity_manager')
            ->getRepository('CSBillPaymentBundle:Payment');

        return $this->manageCollection($fetcher, $repository->createQueryBuilder('c'), 'get_payments');
    }
}

<?php

/*
 * This file is part of CSBill project.
 *
 * (c) 2013-2015 Pierre du Plessis <info@customscripts.co.za>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CSBill\MoneyBundle;

use CSBill\MoneyBundle\Doctrine\Hydrator\MoneyHydrator;
use CSBill\MoneyBundle\Doctrine\Types\MoneyType;
use Money\Currency;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class CSBillMoneyBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        /** @var Currency $currency */
        $currency = $this->container->get('currency');

        MoneyType::setCurrency($currency);
        MoneyHydrator::setCurrency($currency);
    }
}

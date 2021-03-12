<?php

namespace Aristides\Helpers;

use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    public function testMoney2Real()
    {
        $value = '14524.85';
        $valueExpected = '14.524,85';

        $this->assertEquals($valueExpected, Helpers::money2Real($value));
    }

    public function testMoney2RealWithPrefix()
    {
        $value = '4629826';
        $valueExpected = 'R$ 4.629.826,00';

        $this->assertEquals($valueExpected, Helpers::money2Real($value, true));
    }

    public function testMoney2Db()
    {
        $values = [
            '14.587,88' => '14587.88',
            'R$ 88.475.411,89' => '88475411.89',
            'R$ 0,51' => '0.51',
        ];

        foreach ($values as $actual => $expected) {
            $this->assertEquals($expected, Helpers::money2Db($actual));
        }
    }

    public function testTransformMonths()
    {
        $months = [1, 02, 3, '4', '5', '6', '7', '8', '9', '10', '11', 12];
        $expected = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

        foreach ($months as $key => $month) {
            $this->assertEquals($expected[$key], Helpers::transformMonth($month));
        }

        $expected = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];

        foreach ($months as $key => $month) {
            $this->assertEquals($expected[$key], Helpers::transformMonth($month, false));
        }
    }

    public function testTransformWeekDays()
    {
        $days = [0, 1, 02, 3, '4', '5', '6'];
        $expected = ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'];

        foreach ($days as $key => $day) {
            $this->assertEquals($expected[$key], Helpers::transformWeekDays($day));
        }

        $expected = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];

        foreach ($days as $key => $day) {
            $this->assertEquals($expected[$key], Helpers::transformWeekDays($day, false));
        }
    }
}
<?php

namespace Aristides\Helpers;

use PHPUnit\Framework\TestCase;

class ValidationsTest extends TestCase
{
    public function testCpfIsNotValid()
    {
        $cpfs = ['123.456.789-10', '111222333441'];

        foreach ($cpfs as $cpf) {
            $this->assertFalse(Validations::cpf($cpf));
        }
    }

    public function testCpfIsValid()
    {
        $cpfs = ['08710498052', '605.079.870-20'];

        foreach ($cpfs as $cpf) {
            $this->assertTrue(Validations::cpf($cpf));
        }
    }

    public function testEmailIsValid()
    {
        $emails = [
            'claudiosergiopires.claudiosergiopires@puenteimoveis.com.br',
            'mariahyasmindanielafigueiredo-72@willianareiaepedra.com.br',
            'bernardojosediogoassis-80@mail.com',
            'aaliciaaylareginadepaula@gmx.com',
        ];

        foreach ($emails as $email) {
            $this->assertTrue(Validations::email($email));
        }
    }

    public function testEmailIsNotValid()
    {
        $emails = [
            'claudiosergiopires.claudiosergiopires@puenteimoveis',
            'mariahyasmindanielafigueiredo-72.willianareiaepedra.com.br',
            'bernardojosediogoassis-80@com',
            'aaliciaaylareginadepaula@a.',
        ];

        foreach ($emails as $email) {
            $this->assertFalse(Validations::email($email));
        }
    }
}

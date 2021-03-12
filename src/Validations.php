<?php
declare(strict_types=1);

namespace Aristides\Helpers;

class Validations
{
    /**
     * Validação de CPF
     * Algoritimo de verificação: http://www.macoratti.net/alg_cpf.htm
     *
     * @param string $value
     * @return bool
     */
    public static function cpf(string $value) : bool
    {
        $cpf = preg_replace('/[^0-9]/is', '', $value);

        if (strlen($cpf) !== 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }

    /**
     * Valida de e-mail
     *
     * @param string $email
     * @return bool
     */
    public static function email(string $email) : bool
    {
        $format = '/[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/';

        if (preg_match($format, $email)) {
            return true;
        }

        return false;
    }
}

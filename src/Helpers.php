<?php
declare(strict_types=1);

namespace Aristides\Helpers;

class Helpers
{
    /**
     * Formata um valor decimal para formato de moeda Real
     * prefix = true para adicionar o 'R$' antes do valor
     *
     * @param float $value
     * @param bool $prefix
     * @return string
     */
    public static function formatMoneyToReal(float $value, bool $prefix = false) : string
    {
        $prefix = $prefix ? 'R$ ' : '';

        return $prefix . number_format($value, 2, ',', '.');
    }

    /**
     * Formata uma valor de moeda Real para decimal
     * Utilizado para salvar no banco de dados
     *
     * @param string $value
     * @return string
     */
    public static function formatMoneyToDatabase(string $value) : string
    {
        $array = explode(' ', $value);

        if ($array[0] === 'R$') {
            return str_replace(['.', ','], ['', '.'], $array[1]);
        }

        return str_replace(['.', ','], ['', '.'], $array[0]);
    }

    /**
     * Tranforma o mês númerico em um mês por extenso
     * fullText = true para retornar o mês inteiro
     * fullText = false para retornar a inicial do mês com 3 caracteres
     *
     * @param int $value
     * @param bool $fullText
     * @return string
     */
    public static function transformMonth(int $value, bool $fullText = true) : string
    {
        if ($value < 1 || $value > 12) {
            throw new \Exception('Number is invalid');
        }

        $months = [
            'Janeiro',
            'Fevereiro',
            'Março',
            'Abril',
            'Maio',
            'Junho',
            'Julho',
            'Agosto',
            'Setembro',
            'Outubro',
            'Novembro',
            'Dezembro',
        ];

        return $fullText ? $months[$value - 1] : substr($months[$value - 1], 0, 3);
    }

    /**
     * Transforma o dia da semana numérico em um dia por extenso
     * fulltext = true para retornar o dia da semana por inteiro
     * fullText = false para retornar as inicias do dia com 3 caracteres
     *
     * @param int $value
     * @param bool $fullText
     * @return string
     */
    public static function transformWeekDays(int $value, bool $fullText = true) : string
    {
        if ($value < 0 || $value > 6) {
            throw new \Exception('Number is invalid');
        }

        $days = [
            'Domingo',
            'Segunda-feira',
            'Terça-feira',
            'Quarta-feira',
            'Quinta-feira',
            'Sexta-feira',
            'Sábado',
        ];

        $strLimit = $value === 6 ? 4 : 3;

        return $fullText ? $days[$value] : substr($days[$value], 0, $strLimit);
    }

    /**
     * Adiciona mascaras em uma string
     *
     * @param string $mask
     * @param string $value
     * @param string $ch
     * @return string
     */
    public static function mask(string $mask, string $value, string $ch = '#') : string
    {
        $c = 0;
        $result = '';

        for ($i = 0; $i < strlen($mask); $i++) {
            if ($mask[$i] == $ch) {
                $result .= $value[$c];
                $c++;
            } else {
                $result .= $mask[$i];
            }
        }

        return $result;
    }
}

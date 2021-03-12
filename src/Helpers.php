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
    public static function money2Real(float $value, bool $prefix = false) : string
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
    public static function money2Db(string $value) : string
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
        $months = [
            1 => 'Janeiro',
            2 => 'Fevereiro',
            3 => 'Março',
            4 => 'Abril',
            5 => 'Maio',
            6 => 'Junho',
            7 => 'Julho',
            8 => 'Agosto',
            9 => 'Setembro',
            10 => 'Outubro',
            11 => 'Novembro',
            12 => 'Dezembro',
        ];

        return $fullText ? $months[$value] : substr($months[$value], 0, 3);
    }

    /**
     * Transforma o dia da semana numérico em um dia por extenso
     * fulltext = true para retornar o dia da semana por inteiro
     * fullText = false para retornar as inicias do dia com 3 caracteres
     *
     * @param string $value
     * @param bool $fullText
     * @return string
     */
    public static function transformWeekDays(string $value, $fullText = true) : string
    {
        $days = [
            0 => 'Domingo',
            1 => 'Segunda-feira',
            2 => 'Terça-feira',
            3 => 'Quarta-feira',
            4 => 'Quinta-feira',
            5 => 'Sexta-feira',
            6 => 'Sábado',
        ];

        $strLimit = $value == 6 ? 4 : 3;

        return $fullText ? $days[$value] : substr($days[$value], 0, $strLimit);
    }
}

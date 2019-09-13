<?php

namespace App\Classes;

class ArrayFormatter
{
    /**
     * @param array $input
     * @param int $min
     * @param int $max
     * @return string
     */
    public function filterValuesBetweenMinMax(array $input, int $min, int $max): string {
        // Get diff values in [min-max] vs input and then reindex to 0 in a easy one liner
        $diff = array_values(array_diff(range($min, $max), $input));
        $output = '';

        // Basic logic for formatting
        foreach ($diff as $key => $val) {
            if ($key == 0) {
                $output = $val;
                continue;
            }

            if (($val - 1) != $diff[$key-1]) {
                $output .= ','.$val;
            }
            else {
                // Check if next value exists and if the next value does not equal one more than the current
                // then output the "-value" string, otherwise ignore it
                if (isset($diff[$key+1]) && $diff[$key+1] != ($val + 1)) {
                    $output .= '-'.$val;
                }
            }
        }
        
        // To deal with the last number, a bit ugly...
        if (max($diff) != $max) {
            $output .= '-'.max($diff);
        }
        elseif(substr($output, strrpos($output, ',')+1) != max($diff)) {
            $output .= '-'.max($diff);   
        }

        return $output;
    }
}

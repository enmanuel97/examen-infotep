<?php

if ( ! function_exists('display_error'))
{
    /**
     * Ordered List
     *
     * Generates an HTML ordered list from an single or multi-dimensional array.
     *
     * @param	array
     * @param	mixed
     * @return	string
     */
    function display_error($error)
    {
        return "<div class='alert alert-danger'><h3>Errores de validaci&oacute;n</h3> <ol>$error</ol></div>";
    }
}
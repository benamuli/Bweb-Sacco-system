<?php
function reg_number($i)
{
    $regNum = '';
    $uniqueId = str_pad($i, 2, '0', STR_PAD_LEFT);
    $date = date('y');
    $regNum = "SCH" . '\\' . $date . '\\' . $uniqueId;
    return $regNum;
};
echo reg_number(4);
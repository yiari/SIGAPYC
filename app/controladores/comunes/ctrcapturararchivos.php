<?php

/**
* @brief get the POSTed files in a more usable format
    Works on the following methods:
        <form method="post" action="/" name="" enctype="multipart/form-data">
        <input type="file" name="photo1" />
        <input type="file" name="photo2[]" />
        <input type="file" name="photo2[]" />
        <input type="file" name="photo3[]" multiple />
* @return   Array
* @todo
* @see  http://stackoverflow.com/questions/5444827/how-do-you-loop-through-files-array
*/

class ctrcapturararchivos{ 

    public function GetPostedFiles()
    {
        /* group the information together like this example
        Array
        (
            [attachments] => Array
            (
                [0] => Array
                (
                    [name] => car.jpg
                    [type] => image/jpeg
                    [tmp_name] => /tmp/phpe1fdEB
                    [error] => 0
                    [size] => 2345276
                )
            )
            [jimmy] => Array
            (
                [0] => Array
                (
                    [name] => 1.jpg
                    [type] => image/jpeg
                    [tmp_name] => /tmp/phpx1HXrr
                    [error] => 0
                    [size] => 221041
                )
                [1] => Array
                (
                    [name] => 2 ' .jpg
                    [type] => image/jpeg
                    [tmp_name] => /tmp/phpQ1clPh
                    [error] => 0
                    [size] => 47634
                )
            )
        )
        */

        $Result = array();
        $Name = array();
        $Type = array();
        $TmpName = array();
        $Error = array();
        $Size = array();
        foreach($_FILES as $Field => $Data)
        {
            foreach($Data as $Key => $Val)
            {
                $Result[$Field] = array();
                if(!is_array($Val))
                    $Result[$Field] = $Data;
                else
                {
                    $Res = array();
                    self::GPF_FilesFlip($Res, array(), $Data);
                    $Result[$Field] += $Res;
                }
            }
        }

        return $Result;
    }

    private function GPF_ArrayMergeRecursive($PaArray1, $PaArray2)
    {
        // helper method for GetPostedFiles
        if (!is_array($PaArray1) or !is_array($PaArray2))
            return $PaArray2;
        foreach ($PaArray2 AS $SKey2 => $SValue2)
            $PaArray1[$SKey2] = self::GPF_ArrayMergeRecursive(@$PaArray1[$SKey2], $SValue2);
        return $PaArray1;
    }

    private function GPF_FilesFlip(&$Result, $Keys, $Value)
    {
        // helper method for GetPostedFiles
        if(is_array($Value))
        {
            foreach($Value as $K => $V)
            {
                $NewKeys = $Keys;
                array_push($NewKeys, $K);
                self::GPF_FilesFlip($Result, $NewKeys, $V);
            }
        }
        else
        {
            $Res = $Value;
            // move the innermost key to the outer spot
            $First = array_shift($Keys);
            array_push($Keys, $First);
            foreach(array_reverse($Keys) as $K)
                $Res = array($K => $Res); // you might think we'd say $Res[$K] = $Res, but $Res starts out not as an array
            $Result = self::GPF_ArrayMergeRecursive($Result, $Res);
        }
    }

}

?>
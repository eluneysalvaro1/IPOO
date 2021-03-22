<?php

$arregloVinos = [
    "malbec" => [
        ["variedad" => "Seco" , "cantidadBotellas" => 5 , "anioProduccion" => 1999 , "precioPorUnidad" => 700,],
        ["variedad" => "Dulce" , "cantidadBotellas" => 10 , "anioProduccion" => 2001 , "precioPorUnidad" => 850 ],
        ["variedad" => "Semidulce" , "cantidadBotellas" => 200 , "anioProduccion" => 2021 , "precioPorUnidad" => 980 ]
        ]
     ,
    "cabernetSauvignon" => [
        ["variedad" => "Seco", "cantidadBotellas" => 8, "añoProduccion" => 2000, "precioPorUnidad" => 2600],
        ["variedad" => "Dulce" , "cantidadBotellas" => 18 , "anioProduccion" => 1980 , "precioPorUnidad" => 522 ],
        ["variedad" => "Semidulce" , "cantidadBotellas" => 5 , "anioProduccion" => 2019 , "precioPorUnidad" => 80 ]
    ],
    "merlot" =>[
        ["variedad" => "Seco", "cantidadBotellas" => 1, "añoProduccion" => 2005, "precioPorUnidad" => 900],
        ["variedad" => "Dulce" , "cantidadBotellas" => 68 , "anioProduccion" => 2002 , "precioPorUnidad" => 1050],
        ["variedad" => "Semidulce" , "cantidadBotellas" => 201 , "anioProduccion" => 1995 , "precioPorUnidad" => 50] 
    ]];

function vinos($vinos){
    $cantBotellas = 0;
    $precioTotal = 0;
    for ($i=0; $i < 1; $i++) { 
        for ($j = 0; $j < 3 ; $j++) { 
            $cantBotellas = $cantBotellas + $vinos["malbec"][$j]["cantidadBotellas"];
            $precioTotal = $precioTotal + $vinos["malbec"][$j]["precioPorUnidad"];
        };
        $arregloNuevo["malbec"] = ["cantidadBotellas" => $cantBotellas , "precioPromedio" => round($precioTotal/3)];
        $cantBotellas = 0;
        $precioTotal = 0;
        for ($j = 0; $j < 3 ; $j++) { 
            $cantBotellas = $cantBotellas + $vinos["cabernetSauvignon"][$j]["cantidadBotellas"];
            $precioTotal = $precioTotal + $vinos["cabernetSauvignon"][$j]["precioPorUnidad"];
        };
        $arregloNuevo["cabernerSauvignon"] = ["cantidadBotellas" => $cantBotellas , "precioPromedio" => round($precioTotal/3)];
        $cantBotellas = 0;
        $precioTotal = 0;   
        for ($j = 0; $j < 3 ; $j++) { 
            $cantBotellas = $cantBotellas + $vinos["merlot"][$j]["cantidadBotellas"];
            $precioTotal = $precioTotal + $vinos["merlot"][$j]["precioPorUnidad"];
        };
        $arregloNuevo["merlot"] = ["cantidadBotellas" => $cantBotellas , "precioPromedio" => round($precioTotal/3)];
    };
    print_r($arregloNuevo);
    return $arregloNuevo;
};

$datosVinos = vinos($arregloVinos);


function main($datosVinos){
    echo "Quiere ver la informacion de: \n
        1_ Malbec\n
        2_ Cabernet Sauvignon\n
        3_ Merlot\n
        0_ Ninguna
";
    $variable = trim(fgets(STDIN));

    switch ($variable) {
        case '1':
        for ($i=0; $i < 3; $i++) { 
            echo "--------------- Malbec --------------- \n";
            echo "Variedad: " . $datosVinos["malbec"][$i]["variedad"] . "\n";            
            echo  "Cantidad Botellas: " . $datosVinos["malbec"][$i]["cantidadBotellas"] . "\n";
            echo  "Año: " . $datosVinos["malbec"][$i]["anioProduccion"] . "\n";
            echo  "Precio por Unidad: " . $datosVinos["malbec"][$i]["precioPorUnidad"] . "\n"; 
                 
            ;
        }
            break;
        case '2':
            for ($i=0; $i < 3; $i++) { 
                echo "--------------- Cabernet Sauvignon --------------- \n";
                echo "Variedad: " . $datosVinos["cabernetSauvignon"][$i]["variedad"] . "\n";           
                echo "Cantidad Botellas: " . $datosVinos["cabernetSauvignon"][$i]["cantidadBotellas"] . "\n";
                echo "Año: " . $datosVinos["cabernetSauvignon"][$i]["anioProduccion"] . "\n";
                echo "Precio por Unidad: " . $datosVinos["cabernetSauvignon"][$i]["precioPorUnidad"] . "\n"; 
                ;
            }
            break;
        case '3':
            for ($i=0; $i < 3; $i++) { 
                echo "--------------- Merlot --------------- \n";
                echo "Variedad: " . $datosVinos["merlot"][$i]["variedad"];           
                echo "Cantidad Botellas: " . $datosVinos["merlot"][$i]["cantidadBotellas"];
                echo "Año: " . $datosVinos["merlot"][$i]["anioProduccion"];
                echo "Precio por Unidad: " . $datosVinos["merlot"][$i]["precioPorUnidad"]; 
                ;
            }
            break;
        case '0':
            echo "Cerrando...";
            break;
        default:
            echo "Error... Error... PRUGGGG";
            break;
    }    
    

    print_r($datosVinos);
    return $datosVinos;
};


main($arregloVinos);

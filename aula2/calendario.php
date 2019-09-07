<?php
function criar_linha($semana,$mes)
{
  
    if(count($semana) == 0)
    return;
    
    $dia_atual = date("d");
    $mes_atual = date("n");


    echo "<tr>";
for($i = 0; $i <= 6;$i++)
{
    
    if(isset($semana[$i]))
    {
        
        if($semana[$i] == $dia_atual && $mes_atual = $mes)
        {
            echo "<th><u>$semana[$i]</u></th>";
        } else if($i == 6)
        {
            echo "<th><b>$semana[$i]</b></th>";
        }
        else if($i == 0)
        {
            echo "<th><b style='color:red'>$semana[$i]</b></th>";
        }
        else
        {
            echo "<th>$semana[$i]</th>";
        }
    }
    else
    {
        echo "<th></th>";
    }
    
}
echo "</tr>";      
}

function obter_nome_do_mes($mes)
{
    switch($mes)
    {
        case 1:
            echo "<h3>Janeiro</h3>";
            break;
            case 2:
            echo "<h3>Fevereiro</h3>";
            break;
            case 3:
            echo "<h3>Março</h3>";
            break;
            case 4:
            echo "<h3>Abril</h3>";
            break;
            case 5:
            echo "<h3>Maio</h3>";
            break;
            case 6:
            echo "<h3>Junho</h3>";
            break;
            case 7:
            echo "<h3>Julho</h3>";
            break;
            case 8:
            echo "<h3>Agosto</h3>";
            break;
            case 9:
            echo "<h3>Setembro</h3>";
            break;
            case 10:
            echo "<h3>Outubro</h3>";
            break;
            case 11:
            echo "<h3>Novembro</h3>";
            break;
            case 12:
            echo "<h3>Dezembro</h3>";
            break;
    }
}

function adicionar_calendario($mes)
{
    $dia = 1;
    $semana = array();


    //echo '<h3>' . obter_nome_do_mes($mes) . "</h3>";
    echo "<h3>" . date('F',mktime(0,0,0,$mes,1)) . "</h3>";
    echo "
    <table border='1'>
    <tr>
        <th>Dom</th>
        <th>Seg</th>
        <th>Ter</th>
        <th>Qua</th>
        <th>Qui</th>
        <th>Sex</th>
        <th>Sáb</th>
    </tr>
    ";

    $dia_da_semana = date('w',mktime(0,0,0,$mes,1));
    for($i = 0; $i < 6; $i++)
    {
        if(count($semana) < $dia_da_semana)
        {
            array_push($semana, "");
        }else
        {
            array_push($semana,$dia);
            $dia++;
        }
    }

    while($dia <= 31)
    {

        
        array_push($semana,$dia);

        if(count($semana) == 7)
        {
            criar_linha($semana,$mes);
            $semana = array();
        }
        $dia++;
    }
    criar_linha($semana,$mes);    

    echo "</table>";
}

function criar_calendario()
{

    for($mes = 1; $mes <= 12; $mes++)
    {  adicionar_calendario($mes); }  
}
criar_calendario();
?>

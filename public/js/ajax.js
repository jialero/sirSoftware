/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function($){
    $(".calendar").click(cambiarEstilo);
    $(".calendar").dblclick(cambiarFondo);
    memoria=0;
    memoria2=1000;
    var matriz=new Array(7); 
    for (i = 0; i < 24; i++){ 
        matriz[i]=new Array(7); 
    }
    contInicio=0;
    contFin=0;
    inicializarMatriz();
    
    
    function inicializarMatriz()
    {
        for(i=0;i<24;i++)
        {
            for(j=0;j<7;j++)
            {
                matriz[i][j]=0;
            }
        }
    }
    
    function imprimir()
    {
        for(i=0;i<24;i++)
        {
            for(j=0;j<7;j++)
            {
                console.log("matriz["+i+"]["+j+"]="+matriz[i][j]);
            }
        }
    }
    
    function llenarCeldas(fila,columna)
    {
        matriz[fila][columna]=1;
    }
    
    function revisarColumna(columna)
    {
        arrPosiciones=[];
        cont=0;
        arrPosiciones[0]=0;
        for(i=0;i<24;i++)
        {
            if(matriz[i][columna]==1)
            {
                cont++;
                arrPosiciones[cont]=i;
            }
        }
        return cont;
    }
    
    function inicioFin(contador)
    {
        arrInicio=[];
        arrFin=[];
        //console.log("contador"+filasLlenas);
        if(contador%2==0)
        {
            //console.log("entro al condicional"+filasLlenas);
            for(k=1;k<=contador;k++)
            {
               if(k%2==0)
               {
                   arrFin[contInicio]=arrPosiciones[k];
                   contInicio++;
               }                   
               else
               {
                   arrInicio[contFin]=arrPosiciones[k];
                   contFin++;
               }
            }
        }
    }
    
    function imprimirPosiciones(cont)
    {
        for(j=1;j<=cont;j++)
        {
            console.log("arrPosiciones["+j+"]="+arrPosiciones[j]);
        }        
    }
    
    function imprimirInicio()
    {
        for(j=0;j<10;j++)
        {
            console.log("arrInicio["+j+"]="+arrInicio[j]);
        }        
    }
    
    function imprimirFin()
    {
        for(j=0;j<10;j++)
        {
            console.log("arrFin["+j+"]="+arrFin[j]);
        }        
    }
    
    function pintarRango(columna)
    {
        for(i=0;i<=contInicio;i++)
        {
            j=arrInicio[i];
            do
            {
                //console.log("ENTRO AL CICLO");
                //console.log("valor 1: "+valor[1]);
                id="#"+j+"-"+columna+"";
                //alert("memoria: "+id);
                $(id).css("background-color","#34F50A");
                j++;                    
            }while(j<=arrFin[i]);
        }        
    }
    
    function asignarInput(columna)
    {
        console.log("ENTRO COLUMNA:"+columna);
        switch(columna)
        {
            case '0':
                console.log("contInicio: "+contInicio);
                console.log("contFin: "+contFin);
                console.log("arrInicio: "+arrInicio[contInicio-1]);
                console.log("arrFin: "+arrFin[contFin-1]);
                if(arrInicio[contInicio-1]>9)
                {
                    $("#lunes_inicio").attr("value",arrInicio[contInicio-1]+":00");                    
                    $("#lunes_inicio").text(arrInicio[contInicio-1]+":00");                    
                }
                else
                {
                    $("#lunes_inicio").attr("value","0"+arrInicio[contInicio-1]+":00");                    
                    $("#lunes_inicio").text("0"+arrInicio[contInicio-1]+":00");                    
                }   
                if(arrFin[contFin-1]>9)
                {
                    $("#lunes_fin").attr("value",arrFin[contFin-1]+":00");
                    $("#lunes_fin").text(arrFin[contFin-1]+":00");
                }
                else
                {
                    $("#lunes_fin").attr("value","0"+arrFin[contFin-1]+":00");
                    $("#lunes_fin").text("0"+arrFin[contFin-1]+":00");
                }
                //console.log("ENTRO OP 0");
                //console.log("arrInicio: "+arrInicio[0]);
                //console.log("arrFin: "+arrFin[0]);
                break;
            case '1':
                if(arrInicio[contInicio-1]>9)
                {
                    $("#martes_inicio").attr("value",arrInicio[contInicio-1]+":00");                    
                    $("#martes_inicio").text(arrInicio[contInicio-1]+":00");                    
                }
                else
                {
                    $("#martes_inicio").attr("value","0"+arrInicio[contInicio-1]+":00");                    
                    $("#martes_inicio").text("0"+arrInicio[contInicio-1]+":00");                    
                }   
                if(arrFin[contInicio-1]>9)
                {
                    $("#martes_fin").attr("value",arrFin[contFin-1]+":00");
                    $("#martes_fin").text(arrFin[contFin-1]+":00");
                }
                else
                {
                    $("#martes_fin").attr("value","0"+arrFin[contFin-1]+":00");
                    $("#martes_fin").text("0"+arrFin[contFin-1]+":00");
                }
                break;
            case '2':
                if(arrInicio[contInicio-1]>9)
                {
                    $("#miercoles_inicio").attr("value",arrInicio[contInicio-1]+":00");                    
                    $("#miercoles_inicio").text(arrInicio[contInicio-1]+":00");                    
                }
                else
                {
                    $("#miercoles_inicio").attr("value","0"+arrInicio[contInicio-1]+":00");                    
                    $("#miercoles_inicio").text("0"+arrInicio[contInicio-1]+":00");                    
                }   
                if(arrFin[contFin-1]>9)
                {
                    $("#miercoles_fin").attr("value",arrFin[contFin-1]+":00");
                    $("#miercoles_fin").text(arrFin[contFin-1]+":00");
                }
                else
                {
                    $("#miercoles_fin").attr("value","0"+arrFin[contFin-1]+":00");
                    $("#miercoles_fin").text("0"+arrFin[contFin-1]+":00");
                }
                break;
            case '3':
                if(arrInicio[contInicio-1]>9)
                {
                    $("#jueves_inicio").attr("value",arrInicio[contInicio-1]+":00");                    
                    $("#jueves_inicio").text(arrInicio[contInicio-1]+":00");                    
                }
                else
                {
                    $("#jueves_inicio").attr("value","0"+arrInicio[contInicio-1]+":00");                    
                    $("#jueves_inicio").text("0"+arrInicio[contInicio-1]+":00");                    
                }   
                if(arrFin[contFin-1]>9)
                {
                    $("#jueves_fin").attr("value",arrFin[contFin-1]+":00");
                    $("#jueves_fin").text(arrFin[contFin-1]+":00");
                }
                else
                {
                    $("#jueves_fin").attr("value","0"+arrFin[contFin-1]+":00");
                    $("#jueves_fin").text("0"+arrFin[contFin-1]+":00");
                }
                break;
            case '4':
                if(arrInicio[contInicio-1]>9)
                {
                    $("#viernes_inicio").attr("value",arrInicio[contInicio-1]+":00");                    
                    $("#viernes_inicio").text(arrInicio[contInicio-1]+":00");                    
                }
                else
                {
                    $("#viernes_inicio").attr("value","0"+arrInicio[contInicio-1]+":00");                    
                    $("#viernes_inicio").text("0"+arrInicio[contInicio-1]+":00");                    
                }   
                if(arrFin[contFin-1]>9)
                {
                    $("#viernes_fin").attr("value",arrFin[contFin-1]+":00");
                    $("#viernes_fin").text(arrFin[contFin-1]+":00");
                }
                else
                {
                    $("#viernes_fin").attr("value","0"+arrFin[contFin-1]+":00");
                    $("#viernes_fin").text("0"+arrFin[contFin-1]+":00");
                }
                break;
            case '5':
                if(arrInicio[contInicio-1]>9)
                {
                    $("#sabado_inicio").attr("value",arrInicio[contInicio-1]+":00");                    
                    $("#sabado_inicio").text(arrInicio[contInicio-1]+":00");                    
                }
                else
                {
                    $("#sabado_inicio").attr("value","0"+arrInicio[contInicio-1]+":00");                    
                    $("#sabado_inicio").text("0"+arrInicio[contInicio-1]+":00");                    
                }   
                if(arrFin[contFin-1]>9)
                {
                    $("#sabado_fin").attr("value",arrFin[contFin-1]+":00");
                    $("#sabado_fin").text(arrFin[contFin-1]+":00");
                }
                else
                {
                    $("#sabado_fin").attr("value","0"+arrFin[contFin]+":00");
                    $("#sabado_fin").text("0"+arrFin[contFin]+":00");
                }
                break;
            case '6':
                if(arrInicio[contInicio-1]>9)
                {
                    $("#domingo_inicio").attr("value",arrInicio[contInicio-1]+":00");                    
                    $("#domingo_inicio").text(arrInicio[contInicio-1]+":00");                    
                }
                else
                {
                    $("#domingo_inicio").attr("value","0"+arrInicio[contInicio-1]+":00");                    
                    $("#domingo_inicio").text("0"+arrInicio[contInicio-1]+":00");                    
                }   
                if(arrFin[contFin-1]>9)
                {
                    $("#domingo_fin").attr("value",arrFin[contFin-1]+":00");
                    $("#domingo_fin").text(arrFin[contFin-1]+":00");
                }
                else
                {
                    $("#domingo_fin").attr("value","0"+arrFin[contFin-1]+":00");
                    $("#domingo_fin").text("0"+arrFin[contFin-1]+":00");
                }
                break;
        }        
    }
    
    function cambiarEstilo()
    {
        x=$(this);       
        valor=x.attr("value").split('-');
        llenarCeldas(valor[0],valor[1])
        //imprimir();
        //console.log("columna"+valor[1]);
        filasLlenas=revisarColumna(valor[1]);
        //console.log("filasLlenas"+filasLlenas);
        //imprimirPosiciones(filasLlenas);
        inicioFin(filasLlenas); 
        //imprimirInicio();
        //imprimirFin();
        asignarInput(valor[1]);
        pintarRango(valor[1]);        
        x.css("background-color","#34F50A");  
        
    }  
    
    function cambiarEstilo2()
    {
        x=$(this);
        valor=x.attr("value").split('-');        
        if(memoria!=valor[1])
        {
            memoria=valor[1];
            memoria2=valor[0];
        }
        else
        {
            console.log("ENTRO A FALSO");
            console.log("memoria: "+memoria);
            console.log("valor 1: "+valor[1]);
            console.log("memoria2: "+memoria2);
            console.log("valor 0: "+valor[0]);
            console.log("ENTRO AL CONDICIONAL");
            i=memoria2;
            do
            {
                console.log("ENTRO AL CICLO");
                console.log("memoria: "+memoria);
                console.log("valor 1: "+valor[1]);
                id="#"+i+"-"+valor[1]+"";
                //alert("memoria: "+id);
                $(id).css("background-color","#34F50A");
                i++;                    
            }while(i<=valor[0]);
        }
        x.css("background-color","#34F50A");        
    }  
    
    function cambiarFondo()
    {
        x=$(this);        
        x.css("background-color","transparent");        
    }
    
});

$(function(){
    $("#showform").click(function(){
        $("#winpopup").dialog({
            draggable:true,
            modal: true,
            autoOpen: false,
            height:300,
            width:400,
            resizable: false,
            title:'Formulario Ajax',
            position:'center',
            resizable: true,
        });
        $("#winpopup").load($(this).attr('href'));
        $("#winpopup").dialog("open");
         
        return false;
    });
});


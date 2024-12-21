<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StyleShop</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    
    <div class="contenedor-app">
        <div class="imagen">
            <div class="logo bg-gray" >Style<span class="blue">S</span>hop</div>
            <p class="eslogan bg-gray">"Estilo que define, precisión que inspira."</p>
           
        </div>     
        <div class="app">
            <?php echo $contenido; ?>
        </div>
    </div>
    

    <?php echo $script ?? '' ?>     
</body>
</html>
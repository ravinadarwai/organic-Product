@include('layouts.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Add CSS styles for the box shadow */
        .image-container {
            width: 600px;
            height: 400px;
            margin-left: 26rem;
            margin-bottom: 2rem;
            position: relative;
        }

        .image-box {
            width: 100%;
            height: 100%;
            object-fit: cover;
            box-shadow: 4px 6px 20px rgba(0, 0, 0, 0.2), 4px 6px 20px rgba(0, 0, 0, 0.5); /* Add black box shadow here */
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="font_3 wixui-rich-text__text" style="text-align:center; font-size:25px; margin:4rem;">About Our Market</h1>
        <div class="image-container">
            <img src="https://static.wixstatic.com/media/ad420a_669665f5ac454bf29853afbc02b635df~mv2.jpg/v1/fill/w_750,h_500,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/GettyImages-1128054012.jpg" alt="Woman at the cashier in a grocery store" class="image-box" />
        </div>
        <p style="margin: 3rem;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deleniti temporibus ad. Dolore ipsam ea, nisi ab, quas deserunt corrupti, doloremque nobis quo quae quos sed reprehenderit iure facilis. Sequi aliquid velit exercitationem repellat, est molestias ut accusantium recusandae nemo rem debitis sapiente temporibus molestiae voluptatum porro maxime earum? Nobis, incidunt! Ut atque hic dignissimos, ratione laboriosam saepe labore mollitia placeat ea sunt facere nobis exercitationem! Ab ex in cumque ad distinctio mollitia omnis incidunt nam dolorum magni id consequatur rem, veritatis natus officia alias eius, assumenda voluptatem impedit sed ducimus commodi corporis nesciunt eaque. Iure, aut autem pariatur alias veniam excepturi recusandae adipisci optio quos nulla debitis iste fuga quas, maxime culpa eos aperiam similique sed fugit accusamus fugiat! Modi impedit distinctio dolor odit quod nam provident dolorem eligendi hic. A ipsum explicabo ipsam alias provident! Explicabo, autem perferendis dolore tempora quo soluta quaerat debitis ipsa reiciendis eligendi laborum, officia distinctio illo necessitatibus neque. Neque deleniti assumenda rerum dolore maiores eaque esse, alias dicta quas hic. Doloribus rerum aperiam consectetur deleniti facere? Temporibus excepturi praesentium itaque libero fugiat corrupti dolore eius ea provident cumque, accusantium iusto aut explicabo id hic saepe quis deserunt impedit assumenda. Voluptates, deserunt iusto. Veniam!.</p>
        <p style="margin: 3rem;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi ab ratione assumenda, ipsum debitis vero illo. Obcaecati aperiam consequatur ipsa accusantium laudantium distinctio ratione blanditiis. Soluta ipsa repudiandae perspiciatis earum.</p>
    </div>
    @include('layouts.footer')
</body>
</html>

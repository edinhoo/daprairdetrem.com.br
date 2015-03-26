<?php include( './header.php'); ?>

<section id="local" class="container">
    <img src="<?php echo IMG; ?>/svg/logo.svg" class="logo">

    <!-- Busca da parte superior -->
    <form id="busca-interna" class="busca">
        <ul>
            <li class="tipo svg-bg">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="169.75px" height="96.185px" viewBox="0 0 169.75 96.185" xml:space="preserve">
                    <polygon fill="#8F8C96" points="0,4.252 7.795,31.063 0,96.185 163.25,88.456 169.75,0 " />
                </svg>

                <div class="content">
                    <input type="radio" class="hidden" name="categoria" id="categoria-bar" value="bar" checked>
                    <label for="categoria-bar">Bar</label>

                    <input type="radio" class="hidden" name="categoria" id="categoria-restaurante" value="restaurante">
                    <label for="categoria-restaurante">Restaurante</label>

                    <input type="radio" class="hidden" name="categoria" id="categoria-espaco-cultural" value="espaco-cultural">
                    <label for="categoria-espaco-cultural">Espaço Cultural</label>

                    <input type="radio" class="hidden" name="categoria" id="categoria-evento" value="evento">
                    <label for="categoria-evento">Evento</label>
                </div>
            </li>

            <li class="estacao svg-bg">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="150.878px" height="92.832px" viewBox="0 0 150.878 92.832" xml:space="preserve">
                    <polygon fill="#8F8C96" points="140.957,0 6.378,7.276 0,92.832 150.878,91.932 " />
                </svg>

                <div class="content">
                    <select name="estacao">
                        <option value="estacao1">Estação 1</option>
                        <option value="estacao2">Estação 2</option>
                        <option value="estacao3">Estação 3</option>
                    </select>
                </div>
            </li>

            <li class="nome svg-bg">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="212.425px" height="106.228px" viewBox="0 0 212.425 106.228" xml:space="preserve">
                    <polygon fill="#458F82" points="0,0 14.173,96.894 199.669,106.228 212.425,11.461 " />
                </svg>

                <div class="content">
                    <select name="local">
                        <option value="local1">Local 1</option>
                        <option value="local2">Local 2</option>
                        <option value="local3">Local 3</option>
                    </select>
                </div>
            </li>
        </ul>
    </form>

    <!-- Controles que aparecerão ao lado esquerdo das fotos -->
    <div id="box-avaliacao">
        <div class="box svg-bg info">
            <svg width="190.217px" height="130.605px">
                <polygon fill="#B32B4A" points="171.722,0 0,17.362 11.424,130.605 183.754,120.798 190.217,62.7 171.73,0 " />
            </svg>

            <div class="content">
                <h1>Bar da Amendoeira</h1>
                <div class="local">Estação Maria da Graça</div>
                <div class="endereco">R. Conde de Azambula, 881, Maria da Graça</div>
            </div>
        </div>

        <div class="box svg-bg enviar">
            <svg width="182.4" height="89.5">
                <polygon fill="#FFBE59" points="182.4 0 9.2 11.3 0 82.5 146.4 89.5 " />
                <path clip-path="url(#SVGID_2_)" fill="none" stroke="#231F20" stroke-width="0.5" stroke-miterlimit="10" d="M167.9 22.8c-0.3 0-2.8 0.3-3.1 0.4 -0.5 0.1-1-0.1-1.5 0 -0.5 0.1-1-0.1-1.5-0.1 -0.9 0.1-1.8-0.1-2.8 0 -0.5 0.1-1.3-0.1-1.8 0 -0.1 0 0.1 0 0 0 -0.4-0.1-0.9 0-1.3-0.1 -0.5-0.1-0.9 0.1-1.3 0 -0.6-0.1-1.4 0-2-0.1 -0.4 0-0.8 0-1.2 0 -0.2 0-0.4 0.1-0.6 0.1 -0.2 0-0.5 0-0.7 0 -0.7 0-1.5-0.1-2.2-0.1 -0.5 0-2.7 0-3.4-0.1 -0.3-0.1-1 0-1.4-0.1 -1.3-0.1-1.9 0-3.2-0.1 -1.1-0.1-2.2 0-3.4-0.1 -0.5-0.1-1 0.1-1.5 0 0 0-0.6 0-0.9 0 0 0-1.2-1.1 0.5-1.4 0.6 0.1 2.2 0 2.9 0.1 0.4 0 1.8 0.1 2.2 0.1 0.7 0 1.5 0 2.3 0.1 0.4 0 1 0 1.3 0 0.7 0.1 1.2 0 1.9 0.1 0.3 0.1 0.6 0 0.9 0 0.6 0.1 1.2 0 1.7 0 1 0 1.9 0 2.9 0 0.3 0 0.6 0 0.9 0 0.5 0 1 0.1 1.5 0.1 0.5 0 1-0.1 1.5 0 0.2 0 0.4 0 0.6 0.1 0.6 0.1 1.1 0 1.7 0 0.8 0 1.7 0 2.5-0.1 0.5-0.1 0.9 0 1.4-0.1 0.6 0 1.3 0.1 1.9 0 0.7-0.1 1.3 0 2-0.1 0.6-0.1 1.2 0 1.8-0.1 0.5 0 1.1 0 1.6 0C168.3 21.4 168.5 22.8 167.9 22.8zM150.4 38.5c0-0.2-0.4-2.5-0.4-2.8 -0.1-0.5 0.1-0.9 0-1.4 -0.1-0.4 0.1-0.9 0.1-1.4 -0.1-0.8 0.2-1.7 0-2.5 -0.1-0.5 0.1-1.2 0-1.6 0-0.1 0 0.1 0 0 0.1-0.4 0-0.8 0.1-1.2 0.1-0.4-0.1-0.8 0-1.2 0.1-0.6 0-1.2 0.1-1.8 0-0.4 0-0.7 0-1.1 0-0.2-0.1-0.4-0.1-0.5 0-0.2 0-0.4 0-0.6 0-0.7 0.1-1.3 0.1-2 0-0.4-0.1-2.5 0.1-3 0.1-0.3 0.1-0.9 0.1-1.2 0.1-1.1 0-1.8 0.1-2.9 0.1-1 0-2 0.1-3.1 0.1-0.4-0.1-0.9 0-1.4 0 0 0-0.6 0-0.8 0 0 1.2-1.1 1.5 0.4 -0.1 0.5 0 2-0.1 2.6 0 0.3-0.1 1.7-0.1 2 0 0.7 0 1.4-0.1 2.1 0 0.3 0 0.9 0 1.2 -0.1 0.6 0 1.1-0.2 1.7 -0.1 0.3 0.1 0.5 0 0.8 -0.1 0.5 0 1 0 1.6 0 0.9 0 1.7 0.1 2.6 0 0.3 0 0.6 0 0.8 0 0.4-0.1 0.9-0.1 1.4 0 0.5 0.1 0.9 0 1.4 0 0.2 0 0.4-0.1 0.6 -0.2 0.5 0 1 0 1.6 0 0.8 0 1.5 0.1 2.3 0.1 0.5 0 0.9 0.1 1.3 0.1 0.5-0.1 1.1 0 1.7 0.1 0.6 0 1.2 0.1 1.8 0.1 0.5 0 1.1 0.1 1.6 0.1 0.4 0 1 0 1.4C151.9 38.9 150.4 39 150.4 38.5z" />
            </svg>

            <div class="content">
                <h1>Já esteve aqui?</h1>
                <div class="chamada">Adicione suas fotos e comentários!</div>
            </div>
        </div>
    </div>

    <!-- Coluna de fotos / vídeos -->
    <article class="medias">
        <ul class="gallery">
            <li>
                <a href="img/examples/300x200.gif" class="item">
                    <img src="img/examples/300x200.gif" alt="">
                </a>
            </li>
            <li>
                <a href="img/examples/150x300.gif" class="item">
                    <img src="img/examples/150x300.gif" alt="">
                </a>
            </li>
            <li>
                <a href="img/examples/480x320.gif" class="item">
                    <img src="img/examples/480x320.gif" alt="">
                </a>
            </li>
            <li>
                <a href="img/examples/600x200.gif" class="item">
                    <img src="img/examples/600x200.gif" alt="">
                </a>
            </li>
            <li>
                <a href="img/examples/300x400.gif" class="item">
                    <img src="img/examples/300x400.gif" alt="">
                </a>
            </li>
            <li>
                <a href="img/examples/200x300.gif" class="item">
                    <img src="img/examples/200x300.gif" alt="">
                </a>
            </li>
            <li>
                <a href="img/examples/300x150.gif" class="item">
                    <img src="img/examples/300x150.gif" alt="">
                </a>
            </li>
            <li>
                <a href="img/examples/900x600.gif" class="item">
                    <img src="img/examples/900x600.gif" alt="">
                </a>
            </li>
            <li>
                <a href="img/examples/300x300.gif" class="item">
                    <img src="img/examples/300x300.gif" alt="">
                </a>
            </li>
        </ul>
    </article>

    <!-- Coluna de comentários / opiniões -->
    <aside class="opiniao">
        <ul class="comentarios">
            <li>
                <div class="comentario">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus eligendi beatae architecto facilis autem dolorum nihil amet, harum sit numquam vitae, dicta error aperiam omnis culpa nulla, quisquam ea modi!</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur similique dolore soluta ducimus est, consequuntur excepturi quod expedita doloribus illo, ipsum atque aliquam omnis quae cum voluptatibus ullam nam culpa!</p>
                </div>
                <div class="nome">Pedro Rezende (24), 20/08/2014</div>
            </li>
            <li>
                <div class="comentario">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit porro, in aut esse eius. Qui unde velit, officiis voluptatem, alias dolores delectus reprehenderit deleniti quasi sit aperiam nobis distinctio temporibus!</p>
                </div>
                <div class="nome">Harrison Mendonça (39), 20/08/2014</div>
            </li>
            <li>
                <div class="comentario">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div class="nome">Mr. Teste da Silva (40), 20/09/2015</div>
            </li>
        </ul>
    </aside>
</section>
<?php include( './footer.php'); ?>
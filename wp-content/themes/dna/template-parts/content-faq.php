<?php
// stilos em content-faq.scss
$titulo = get_field('titulo');
$pergResps = get_field('per');
?>
<section class="content-faq">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                echo $titulo ? '<h2>' . $titulo . '</h2><hr>' : '';
                ?>
            </div>
            <div class="col-12">
                <?php
                foreach ($pergResps as $key => $pr) {
                ?>
                <div class="perg-resp" id="resp-<?php echo $key; ?>">
                    <div class="pergunta">
                        <p data-target="resp-<?php echo $key; ?>">
                            <?php echo $pr['pergunta']; ?>
                        </p>
                    </div>
                    <div class="resposta">
                        <?php echo $pr['resposta']; ?>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
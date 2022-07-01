<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Dashboard</h1>
            <p class="lead text-muted"><?php echo $informacion; ?></p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <?php
                foreach($acceso as $link)
                {
                    echo '
                        <div class="col-md-4">
                            <a href="' . base_url() . 'index.php/' . $this->session->userdata('rol') . '/' . $link . '">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <p class="card-text">' . $link . '</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    ';
                }
                ?>
            </div>
        </div>
    </div>

</main>
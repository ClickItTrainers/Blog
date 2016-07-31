
	<title> <?php echo $title ?> </title>


	<h1 class="page-header">
        Welcome to my Blog
        <small><?php echo $this->session->userdata('username');?></small>
    </h1>


	<?php
		foreach ($posts_arr as $item):
			$url = 'post/' . $item->id_post . '/';
			$url .= url_title(convert_accented_characters($item->title), '-', TRUE);
	?>

			<!-- Blog Post List -->
                <h2>
                    <?php echo anchor($url, $item->title) ?>
                </h2>
                <p class="lead">
                    by <a href="index.php"> <?php echo $item->username ?> </a> <!-- nombre de autor -->
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $item->date ?></p>
                <hr>    
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p><?php echo $item->description ?></p>
                <a class="btn btn-primary" href="index.php/<?php echo $url ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

	<?php
		endforeach;
	?>

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>
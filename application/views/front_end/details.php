
	<title> <?php echo $title; ?> </title>

				<!-- Blog Post -->

                <!-- Title -->
                <h1> <?php echo $details->title; ?> </h1>
                
                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $details->username; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $details->date; ?> </p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"> <?php echo $details->description; ?> </p>
                <p> <?php echo $details->content; ?> </p>

                <hr>

                <!-- Blog Comments -->

                <?php if ($this->session->userdata('is_logued_in') == TRUE) { ?>

                <!-- Comments Form -->
                <div class="well" style="background-color: #B0B0B0;">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="<?php echo base_url(); ?>index.php/Home/comment" method="post">
                        <div class="form-group">
                            <textarea maxlength="255" name="comment" class="form-control" rows="3" style="resize: none;"></textarea>
                        </div>
                        <?php echo form_hidden('id_post', $this->uri->segment(2)) ?>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <?php } ?>

                <hr>

                <!-- Posted Comments -->

                <?php if (empty($comments)) {
                    foreach ($comentarios as $item): ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $item->username; ?>
                            <small><?php echo $item->date; ?></small>
                        </h4>
                            <?php echo $item->comment; ?>
                    </div>
                </div>

                <?php endforeach; ?>

                <?php }else{ ?>

                <div class="media">
                    <div class="media-body">
                            <?php echo "No hay comentarios" ?>
                    </div>
                </div>
                <?php } ?>
               
                <!-- Comment 
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                         Nested Comment 
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                         End Nested Comment 
                    </div>
                </div> -->


</div>
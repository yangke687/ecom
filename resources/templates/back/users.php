                    <div class="col-lg-12">
                      

                        <h1 class="page-header">
                            Users
                         
                        </h1>
                        
                        <?php if( has_message() ): ?>
                            <p class="alert alert-success"><?php display_message(); ?></p>
                        <?php endif; ?>

                          <p class="bg-success">
                            <?php //echo $message; ?>
                        </p>

                        <a href="add_user.php" class="btn btn-primary">Add User</a>


                        <div class="col-md-12">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php display_users(); ?>                
                                </tbody>
                            </table> <!--End of Table-->
                        

                        </div>

                    </div>
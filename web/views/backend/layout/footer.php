            <?php
                if(ENVIRONMENT == 'development')
                {
            ?>
                <div class="well well-lg">
                    <?php
                        $queries = $this->user_model->all_query();
                        foreach ($queries as $query) {
                            echo $query . '<br>';
                        }
                    ?>
                </div>
            <?php
                }
            ?>
            </div> <!-- /wraper -->
        </div> <!-- /container -->
        <?php $this->load->view('backend/layout/_modal'); ?>
    </body>
</html>
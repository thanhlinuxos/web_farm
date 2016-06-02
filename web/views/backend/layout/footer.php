            <?php
                if(ENVIRONMENT == 'development')
                {
            ?>
                <script>
                    function show_all_query()
                    {
                        $("#show_all_query").show();
                    }
                </script>
                <button type="button" class="btn btn-primary" onclick="show_all_query();">Show All Query</button>
                <div class="well well-lg" style="display: none;" id="show_all_query">
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
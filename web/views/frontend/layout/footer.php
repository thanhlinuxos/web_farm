            <?php
                if(ENVIRONMENT == 'development')
                {
            ?>
                <script>
                    function show_all_query()
                    {
                        $("#show_all_query").show();
                        $("#btn_hide_all_query").show();
                        $("#btn_show_all_query").hide();
                        $('html,body').animate({
                            scrollTop: $("#show_all_query").offset().top},
                            'slow'
                        );
                    }
                    function hide_all_query()
                    {
                        $("#show_all_query").hide();
                        $("#btn_hide_all_query").hide();
                        $("#btn_show_all_query").show();
                    }
                </script>
                <button type="button" class="btn btn-primary" id="btn_show_all_query" onclick="show_all_query();">Show All Query</button>
                <button type="button" class="btn btn-primary" id="btn_hide_all_query" onclick="hide_all_query();" style="display: none;">Hide All Query</button>
                <br><br>
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
            </div><!-- /wraper-->
            <div style="margin-top: 10px; color: #029f5b;">
                <?php
                    echo 'PROCESS TIME: <strong>' . $this->benchmark->elapsed_time(). '</strong> - MEMORY USAGE: <strong>' . $this->benchmark->memory_usage().'</strong>';
                    echo ' - YOUR PC: <strong>' . $this->agent->platform() . '</strong> - YOUR BROWSER: <strong>' . $this->agent->browser() .' '. $this->agent->version().'</strong>';
                ?>
            </div>
            <?php $this->load->view('frontend/layout/_modal'); ?>
        </div> <!-- /container-fluid -->
    </body>
</html>
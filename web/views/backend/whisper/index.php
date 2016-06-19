<style type="text/css">
    .bg-white {
        background-color: #fff;
    }

    .friend-list {
        list-style: none;
        margin-left: -40px;
    }

    .friend-list li {
        border-bottom: 1px solid #eee;
    }

    .friend-list li a img {
        float: left;
        width: 45px;
        height: 45px;
        margin-right: 0px;
    }

    .friend-list li a {
        position: relative;
        display: block;
        padding: 10px;
        transition: all .2s ease;
        -webkit-transition: all .2s ease;
        -moz-transition: all .2s ease;
        -ms-transition: all .2s ease;
        -o-transition: all .2s ease;
    }

    .friend-list li.active a {
        background-color: #f1f5fc;
    }

    .friend-list li a .friend-name, 
    .friend-list li a .friend-name:hover {
        color: #777;
    }

    .friend-list li a .last-message {
        width: 65%;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .friend-list li a .time {
        position: absolute;
        top: 10px;
        right: 8px;
    }

    small, .small {
        font-size: 85%;
    }

    .friend-list li a .chat-alert {
        position: absolute;
        right: 8px;
        top: 27px;
        font-size: 10px;
        padding: 3px 5px;
    }

    .chat-message {
        padding: 60px 20px 115px;
    }

    .chat {
        list-style: none;
        margin: 0;
    }

    .chat-message{
        background: #f9f9f9;  
    }

    .chat li img {
        width: 45px;
        height: 45px;
        border-radius: 50em;
        -moz-border-radius: 50em;
        -webkit-border-radius: 50em;
    }

    img {
        max-width: 100%;
    }

    .chat-body {
        padding-bottom: 20px;
    }

    .chat li.left .chat-body {
        margin-left: 70px;
        background-color: #fff;
    }

    .chat li .chat-body {
        position: relative;
        font-size: 14px;
        padding: 10px;
        border: 1px solid #f1f5fc;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
        -moz-box-shadow: 0 1px 1px rgba(0,0,0,.05);
        -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }

    .chat li .chat-body .header {
        padding-bottom: 5px;
        border-bottom: 1px solid #f1f5fc;
    }

    .chat li .chat-body p {
        margin: 0;
    }

    .chat li.left .chat-body:before {
        position: absolute;
        top: 10px;
        left: -8px;
        display: inline-block;
        background: #fff;
        width: 16px;
        height: 16px;
        border-top: 1px solid #f1f5fc;
        border-left: 1px solid #f1f5fc;
        content: '';
        transform: rotate(-45deg);
        -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
    }

    .chat li.right .chat-body:before {
        position: absolute;
        top: 10px;
        right: -8px;
        display: inline-block;
        background: #fff;
        width: 16px;
        height: 16px;
        border-top: 1px solid #f1f5fc;
        border-right: 1px solid #f1f5fc;
        content: '';
        transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        -o-transform: rotate(45deg);
    }

    .chat li {
        margin: 15px 0;
    }

    .chat li.right .chat-body {
        margin-right: 70px;
        background-color: #fff;
    }

    .chat-box {
        position: fixed;
        bottom: 31;
        left: 35%;
        right: 45px;
        padding: 15px;
        border-top: 1px solid #eee;
        transition: all .5s ease;
        -webkit-transition: all .5s ease;
        -moz-transition: all .5s ease;
        -ms-transition: all .5s ease;
        -o-transition: all .5s ease;
    }

    .primary-font {
        color: #3c8dbc;
    }

    a:hover, a:active, a:focus {
        text-decoration: none;
        outline: 0;
    }
</style>

<div class="container-fluid bootstrap snippet">
    <div class="row">
        <div class="col-md-4 bg-white ">
            <div class=" row border-bottom padding-sm" style="height: 40px;">
                Member
            </div>

            <!-- =============================================================== -->
            <!-- member list -->
            <ul class="friend-list">
                <li class="active bounceInDown">
                    <a href="#" class="clearfix">
                        <img src="http://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                        <div class="friend-name">	
                            <strong>John Doe</strong>
                        </div>
                        <div class="last-message text-muted">Hello, Are you there?</div>
                        <small class="time text-muted">Just now</small>
                        <small class="chat-alert label label-danger">1</small>
                    </a>
                </li>
                <li>
                    <a href="#" class="clearfix">
                        <img src="http://bootdey.com/img/Content/user_2.jpg" alt="" class="img-circle">
                        <div class="friend-name">	
                            <strong>Jane Doe</strong>
                        </div>
                        <div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>
                        <small class="time text-muted">5 mins ago</small>
                        <small class="chat-alert text-muted"><i class="fa fa-check"></i></small>
                    </a>
                </li> 
                <li>
                    <a href="#" class="clearfix">
                        <img src="http://bootdey.com/img/Content/user_3.jpg" alt="" class="img-circle">
                        <div class="friend-name">	
                            <strong>Kate</strong>
                        </div>
                        <div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>
                        <small class="time text-muted">Yesterday</small>
                        <small class="chat-alert text-muted"><i class="fa fa-reply"></i></small>
                    </a>
                </li>  
                <li>
                    <a href="#" class="clearfix">
                        <img src="http://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                        <div class="friend-name">	
                            <strong>Kate</strong>
                        </div>
                        <div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>
                        <small class="time text-muted">Yesterday</small>
                        <small class="chat-alert text-muted"><i class="fa fa-reply"></i></small>
                    </a>
                </li>     
                <li>
                    <a href="#" class="clearfix">
                        <img src="http://bootdey.com/img/Content/user_2.jpg" alt="" class="img-circle">
                        <div class="friend-name">	
                            <strong>Kate</strong>
                        </div>
                        <div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>
                        <small class="time text-muted">Yesterday</small>
                        <small class="chat-alert text-muted"><i class="fa fa-reply"></i></small>
                    </a>
                </li>        
                <li>
                    <a href="#" class="clearfix">
                        <img src="http://bootdey.com/img/Content/user_6.jpg" alt="" class="img-circle">
                        <div class="friend-name">	
                            <strong>Kate</strong>
                        </div>
                        <div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>
                        <small class="time text-muted">Yesterday</small>
                        <small class="chat-alert text-muted"><i class="fa fa-reply"></i></small>
                    </a>
                </li>          
                <li>
                    <a href="#" class="clearfix">
                        <img src="http://bootdey.com/img/Content/user_5.jpg" alt="" class="img-circle">
                        <div class="friend-name">	
                            <strong>Kate</strong>
                        </div>
                        <div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>
                        <small class="time text-muted">Yesterday</small>
                        <small class="chat-alert text-muted"><i class="fa fa-reply"></i></small>
                    </a>
                </li>
                <li>
                    <a href="#" class="clearfix">
                        <img src="http://bootdey.com/img/Content/user_2.jpg" alt="" class="img-circle">
                        <div class="friend-name">	
                            <strong>Jane Doe</strong>
                        </div>
                        <div class="last-message text-muted">Lorem ipsum dolor sit amet.</div>
                        <small class="time text-muted">5 mins ago</small>
                        <small class="chat-alert text-muted"><i class="fa fa-check"></i></small>
                    </a>
                </li>                 
            </ul>
        </div>

        <!--=========================================================-->
        <!-- selected chat -->
        <div class="col-md-8 bg-white ">
            <div class="chat-message">
                <ul class="chat">
                    <li class="left clearfix">
                        <span class="chat-img pull-left">
                            <img src="http://bootdey.com/img/Content/user_3.jpg" alt="User Avatar">
                        </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font">John Doe</strong>
                                <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 12 mins ago</small>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </p>
                        </div>
                    </li>
                    <li class="right clearfix">
                        <span class="chat-img pull-right">
                            <img src="http://bootdey.com/img/Content/user_1.jpg" alt="User Avatar">
                        </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font">Sarah</strong>
                                <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 13 mins ago</small>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales at. 
                            </p>
                        </div>
                    </li>
                    <li class="left clearfix">
                        <span class="chat-img pull-left">
                            <img src="http://bootdey.com/img/Content/user_3.jpg" alt="User Avatar">
                        </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font">John Doe</strong>
                                <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 12 mins ago</small>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </p>
                        </div>
                    </li>
                    <li class="right clearfix">
                        <span class="chat-img pull-right">
                            <img src="http://bootdey.com/img/Content/user_1.jpg" alt="User Avatar">
                        </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font">Sarah</strong>
                                <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 13 mins ago</small>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales at. 
                            </p>
                        </div>
                    </li>                    
                    <li class="left clearfix">
                        <span class="chat-img pull-left">
                            <img src="http://bootdey.com/img/Content/user_3.jpg" alt="User Avatar">
                        </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font">John Doe</strong>
                                <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 12 mins ago</small>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </p>
                        </div>
                    </li>
                    <li class="right clearfix">
                        <span class="chat-img pull-right">
                            <img src="http://bootdey.com/img/Content/user_1.jpg" alt="User Avatar">
                        </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font">Sarah</strong>
                                <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 13 mins ago</small>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales at. 
                            </p>
                        </div>
                    </li>
                    <li class="right clearfix">
                        <span class="chat-img pull-right">
                            <img src="http://bootdey.com/img/Content/user_1.jpg" alt="User Avatar">
                        </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font">Sarah</strong>
                                <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 13 mins ago</small>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales at. 
                            </p>
                        </div>
                    </li>                    
                </ul>
            </div>
            <div class="chat-box bg-white">
                <div class="input-group">
                    <input class="form-control border no-shadow no-rounded" placeholder="Type your message here">
                    <span class="input-group-btn">
                        <button class="btn btn-success no-rounded" type="button">Send</button>
                    </span>
                </div><!-- /input-group -->	
            </div>            
        </div>        
    </div>
</div>
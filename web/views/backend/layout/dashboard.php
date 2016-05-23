

<div class="page-title">
  <h4>Add user</h4>
</div>

<div class="row">
  <div class="col-xs-12">
    <form class="form-horizontal" role="form">
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" placeholder="Enter email">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Textarea:</label>
        <div class="col-sm-10">
          <textarea class="form-control"></textarea>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Password:</label>
        <div class="col-sm-10"> 
          <input type="password" class="form-control" id="pwd" placeholder="Enter password">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Checkbox</label>
        <div class="col-sm-10"> 
          <label class="checkbox-inline"><input type="checkbox" value="">Option 1</label>
          <label class="checkbox-inline"><input type="checkbox" value="">Option 2</label>
          <label class="checkbox-inline"><input type="checkbox" value="">Option 3</label>
        </div>  
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="sel1">Select list:</label>
        <div class="col-sm-10"> 
          <select class="form-control" id="sel1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
          </select>
        </div>  
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="sel1">Select list:</label>
        <div class="col-sm-10"> 
          <label class="radio-inline">
            <input type="radio" name="optradio">Option 1
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio">Option 2
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio">Option 3
          </label>
        </div>  
      </div>

      

  <div class="form-group">
    <label class="col-sm-2 control-label">Focused</label>
    <div class="col-sm-10">
      <input class="form-control" id="focusedInput" type="text" value="Click to focus">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Disabled</label>
    <div class="col-sm-10">
      <input class="form-control" id="disabledInput" type="text" disabled>
    </div>
  </div>
  <fieldset disabled>
    <div class="form-group">
      <label for="disabledTextInput" class="col-sm-2 control-label">Fieldset disabled</label>
      <div class="col-sm-10">
        <input type="text" id="disabledTextInput" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label for="disabledSelect" class="col-sm-2 control-label"></label>
      <div class="col-sm-10">
        <select id="disabledSelect" class="form-control">
          <option>Disabled select</option>
        </select>
      </div>
    </div>
  </fieldset>
  <div class="form-group has-success has-feedback">
    <label class="col-sm-2 control-label" for="inputSuccess">
    Input with success and icon</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputSuccess">
      <span class="glyphicon glyphicon-ok form-control-feedback"></span>
    </div>
  </div>
  <div class="form-group has-warning has-feedback">
    <label class="col-sm-2 control-label" for="inputWarning">
    Input with warning and icon</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputWarning">
      <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
    </div>
  </div>
  <div class="form-group has-error has-feedback">
    <label class="col-sm-2 control-label" for="inputError">
    Input with error and icon</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputError">
      <span class="glyphicon glyphicon-remove form-control-feedback"></span>
    </div>
  </div>


     
      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
          <button type="button" class="btn btn-primary active">Active Primary</button>
          <button type="button" class="btn btn-primary disabled">Disabled Primary</button>
          <button type="submit" class="btn btn-default">Submit</button>
          <button type="button" class="btn btn-default">Default</button>
          <button type="button" class="btn btn-primary">Primary</button>
          <button type="button" class="btn btn-success">Success</button>
          <button type="button" class="btn btn-info">Info</button>
          <button type="button" class="btn btn-warning">Warning</button>
          <button type="button" class="btn btn-danger">Danger</button>
          <button type="button" class="btn btn-link">Link</button>
          <button type="button" class="btn btn-default">
            <span class="glyphicon glyphicon-search"></span> Search
          </button>
          <button type="button" class="btn btn-info">
            <span class="glyphicon glyphicon-search"></span> Search
          </button>
          <a href="#" class="btn btn-success btn-md">
            <span class="glyphicon glyphicon-print"></span> Print 
          </a>
          <button type="button" class="btn btn-primary">Primary <span class="badge">7</span></button>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <a href="#">News <span class="badge">5</span></a><br>
          <a href="#">Comments <span class="badge">10</span></a><br>
          <a href="#">Updates <span class="badge">2</span></a>
          </div>
      </div>


    </form>
  </div>
</div>

<div class="well">Basic Well</div>
<div class="well well-sm">Small Well</div>
<div class="well well-lg">Large Well</div>


<div class="alert alert-info">
  <strong>Info!</strong> Indicates a neutral informative change or action.
</div>

<div class="alert alert-warning">
  <strong>Warning!</strong> Indicates a warning that might need attention.
</div>

<div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
</div>

<div class="alert alert-success fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Indicates a successful or positive action.
</div>


<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="http://www.funnfun.in/wp-content/uploads/2014/08/Full-hd-wallpapers-free-download-for-mobile.jpg" alt="Chania">
      <div class="carousel-caption">
        <h3>Chania</h3>
        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
      </div>
    </div>

    <div class="item">
      <img src="http://www.funnfun.in/wp-content/uploads/2014/08/Full-hd-wallpapers-free-download-for-mobile.jpg" alt="Chania">
      <div class="carousel-caption">
        <h3>Chania</h3>
        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
      </div>
    </div>

    <div class="item">
      <img src="http://www.funnfun.in/wp-content/uploads/2014/08/Full-hd-wallpapers-free-download-for-mobile.jpg" alt="Flower">
      <div class="carousel-caption">
        <h3>Flowers</h3>
        <p>Beatiful flowers in Kolymbari, Crete.</p>
      </div>
    </div>

    <div class="item">
      <img src="http://www.funnfun.in/wp-content/uploads/2014/08/Full-hd-wallpapers-free-download-for-mobile.jpg" alt="Flower">
      <div class="carousel-caption">
        <h3>Flowers</h3>
        <p>Beatiful flowers in Kolymbari, Crete.</p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<?php $this->layout(config('view.layout')) ?>
<?php $this->start("page") ?>
<style>
        .error-template {padding: 40px 15px;text-align: center;}
        .error-actions {margin-top:15px;margin-bottom:15px;}
        .error-actions .btn { margin-right:10px; }
    </style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>Page Not Found <small class="text-danger">
                	Error 404</small>
		    </h1>
                <div class="error-details">
        			Sorry, an error has occured.
        			The page you requested could not be found.
                </div>
                <div class="error-actions">
                    <a href="/" class="btn btn-primary btn-lg">
                    	<span class="glyphicon glyphicon-home"></span>
                        Take Me Home </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->stop() ?>
<footer class="container">
  <!-- Container (Contact Section) -->
  <div id="contact" class="container-fluid bg-grey">
    <h2 class="text-center">{!! trans('footer.contact') !!}</h2>
    <div class="row">
      <div class="col-sm-5">
        <p>{!! trans('footer.contact_with_us') !!}</p>
        <p><span class="glyphicon glyphicon-map-marker"></span>{!! trans('footer.address') !!}</p>
        <p><span class="glyphicon glyphicon-phone"></span>{!! trans('footer.phone') !!}</p>
        <p><span class="glyphicon glyphicon-envelope"></span>{!! trans('footer.email') !!}</p>
      </div>
      <div class="col-sm-7 slideanim">
        <div class="row">
          <div class="col-sm-6 form-group">
            <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
          </div>
          <div class="col-sm-6 form-group">
            <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
          </div>
        </div>
        <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
        <div class="row">
          <div class="col-sm-12 form-group">
            <button class="btn btn-default pull-right" type="submit">{!! trans('footer.send') !!}</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>


<script type="text/javascript" src="/js/style_admin.js"></script>
<script type="text/javascript" src="/js/style_public.js"></script>

</body>
</html>
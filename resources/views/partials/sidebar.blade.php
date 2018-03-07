<div class="col-xs-12 col-sm-4 blog-sidebar">
          <div class="sidebar-module">
            <h4>About</h4>
            <hr>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>

          <div class="sidebar-module">
            <form action="#">
              <input type="text" placeholder="Search.." name="search">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>

          <div class="sidebar-module">
            <h4>Archives</h4>
            <hr>
            <ol class="list-unstyled">


              @foreach ($archives as $archive)

              <li>
                
                  <a href="/posts?month={{ $archive['month'] }}&year={{ $archive['year'] }}">

                  {{ $archive['month'] . ' ' . $archive['year'] }}

                </a>
              </li>
              @endforeach

            </ol>
          </div>

          <div class="sidebar-module">
            <ul class="list-unstyled">
              <li><a href="#"><i class="fab fa-google-plus-square fa-3x"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter-square fa-3x"></i></a></li>
              <li><a href="#"><i class="fab fa-facebook-square fa-3x"></i></a></li>
              <li><a href="#"><i class="fab fa-github-square fa-3x"></i></a></li>
            </ul>
          </div>

          <div class="sidebar-module">
            <p><small>Disclaimer: No copyright infringement is intended. This is only for educational purposes and not for profit. Some asset/s used are not owned by the developer/s unless otherwise stated; the credit goes to the owner.</small></p>
          </div>

         
        </div><!-- /.blog-sidebar -->












        
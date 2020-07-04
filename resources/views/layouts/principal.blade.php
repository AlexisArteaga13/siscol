<style type="text/css">



.middle{
  position: absolute;
  top: 10%;
  left: 0%;/*
  transform: translate(-50%,-50%);*/
}
  
.menu{
  width: 300px;
  border-radius: 8px;
  overflow: hidden;
}
.item{
  border-top: 1px solid #007180;
  overflow: hidden;
}
.btn{
  display: block;
  padding: 16px 20px;
  background: rgb(83, 182, 165);
  color: #fff;
  position: relative;
}
.btn:before{
  content: "";
  position: absolute;
  width: 14px;
  height: 14px;
  background:#3498db;
  left: 20px;
  bottom: -7px;
  transform: rotate(45deg);
}
.btn i{
  margin-right: 10px;
}
.smenu{
  /*04CC89*/
  background: #04CC89;
  overflow: hidden;
  transition: max-height 0.3s;
  max-height: 0;
}
.smenu a{
  display: block;
  padding: 16px 26px;
  color: white;
  font-size: 14px;
  margin: 4px 0;
  position: relative;
}
.smenu a:before{
  content: "";
  position: absolute;
  width: 6px;
  height: 100%;
  background: #3498db;
  left: 0;
  top: 0;
  transition: 0.3s;
  opacity: 0;
}
.smenu a:hover:before{
  opacity: 1;
}
.item:target .smenu{
  max-height: 10em;
}

  </style>



<div  class="container-fluid row" >
            <div id="list-example" class="list-group col-3" >
            <footer >   
            <div class="middleWW">
                <div class="menuWW" >
                    
                    <ul class="itemWW" id='profile'>
                    <a href="#profile" class="btnWW"><i class="fas fa-book"></i>ALMACEN</a>
                    <div class="smenuWW">
                        @can('products.index')
                        
                            <a  href="{{ route('products.index') }}">Productos</a>
                        
                        @endcan
                        @can('users.index')
                        
                            <a  href="{{ route('users.index') }}">Usuarios</a>
                        
                        @endcan
                    </div>
                    </ul>
                    <ul class="itemWW" id='profile'>
                    <a href="#profile" class="btnWW"><i class="fas fa-book"></i>SEGURIDAD</a>
                    <div class="smenuWW">
                        @can('roles.index')
                                                    
                            <a  href="{{ route('roles.index') }}">Roles</a>
                        
                        @endcan
                    </div>
                    </ul>
                </div>
                </DIV>
                </footer>
            </div>

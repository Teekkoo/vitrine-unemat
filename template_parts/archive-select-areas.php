
<div class="container-fluid ">
    <div class="container">
        <div class="select-areas">
            <div class="box-areas">
                <h2 class="title-select-area" >Áreas de conhecimento</h2>

                <select id="course-areas" name="areas-list" form="courseform" class="select-category"  onchange="javascript:handleSelect(this)">
                  <option>Selecione</option>
                  <option value="http://localhost/ecommerc/wordpress/categoria-curso/ciencias-agrarias/">Ciências Agrárias</option>
                  <option value="http://localhost/ecommerc/wordpress/categoria-curso/ciencias-biologicas/">Ciências Biológicas</option>
                  <option value="http://localhost/ecommerc/wordpress/categoria-curso/ciencias-da-saude/">Ciências da Saúde</option>
                  <option value="http://localhost/ecommerc/wordpress/categoria-curso/ciencias-exatas-terra/">Ciências Exatas e da Terra</option>
                  <option value="http://localhost/ecommerc/wordpress/categoria-curso/ciencias-humanas/">Ciências Humanas</option>
                  <option value="http://localhost/ecommerc/wordpress/categoria-curso/ciencias-sociais-aplicadas/">Ciências Sociais Aplicadas</option>
                  <option value="http://localhost/ecommerc/wordpress/categoria-curso/engenharias/">Engenharias</option>
                  <option value="http://localhost/ecommerc/wordpress/categoria-curso/linguistica-letras-artes/">Linguística, Letras e Artes</option>
                </select>

                <script type="text/javascript">
                    function handleSelect(elm)
                    {
                        window.location = elm.value;
                    }
                </script>

                    
            </div>
            <div class="box-areas">
                <h2 class="title-select-area">Escolha a modalidade</h2>
                <form>
                    <fieldset class="fieldset-modalidade controls">
                        <button type="button" class="control" data-filter="all">Todas</button>
                        <button type="button" class="control" data-filter=".presencial">Presencial</button>
                        <button type="button" class="control" data-filter=".online">Online</button>
                        <button type="button" class="control" data-filter=".hibrido">Híbrido</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="crop-seven">
    <div class="skew-seven">

    </div>
</div>


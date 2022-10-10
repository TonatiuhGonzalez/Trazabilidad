<div class="content-wrapper">
    <div class="border">
        <form>
            <div class="form-group">
                <select name = "select">
                    <option value = "estanque1"> Estanque 1</option>
                    <option value = "estanque2"> Estanque 2</option>
                    <option value = "estanque3"> Estanque 3</option>
                    <option value = "estanque4"> Estanque 4</option>
                    <option value = "estanque5"> Estanque 5</option>
                </select>
                <label for="formGroupExampleInput">Fecha inicio</label>
                <input type="date" id="fechaInicio" name="FechaInicio">
                <label for="formGroupExampleInput2">Fecha fin</label>
                <input type="date" id="fechaInicio" name="FechaInicio">
                <input type="submit" id="consultar" name="consulta" value="Consultar">
            </div>
        </form>       
    </div>
    <div>
        <style>
            body {
                background: rgb(140, 214, 30);
            }
            
            [data-tab-info] {
                display: none;
            }
            
            .active[data-tab-info] {
                display: block;
            }
            
            .tab-content {
                font-size: 30px;
                font-family: sans-serif;
                font-weight: bold;
                color: rgb(82, 75, 75);
            }
            
            .tabs {
                font-size: 20px;
                color: rgb(255, 255, 255);
                display: flex;
                margin: 0;
            }
            
            .tabs span {
                background: rgb(85, 134, 132);
                padding: 10px;
                border: 1px solid rgb(255, 255, 255);
            }
            
            .tabs span:hover {
                background: rgb(29, 185, 112);
                cursor: pointer;
                color: black;
            }
        </style>

        <div class="tabs">
            <span data-tab-value="#tab_1">Información general</span>
            <span data-tab-value="#tab_2">Eficiencia</span>
            <span data-tab-value="#tab_3">Relaciones</span>
            <span data-tab-value="#tab_4">Biometría</span>
        </div>
    
        <div class="tab-content">
            <div class="tabs__tab active" id="tab_1" data-tab-info>
                <p>Welcome to SIGETA.</p>    
            </div>
            <div class="tabs__tab" id="tab_2" data-tab-info>
                <p>Hello Everyone.</p>    
            </div>
            <div class="tabs__tab" id="tab_3" data-tab-info>
                <p>Learn cool stuff.</p>    
            </div>
            <div class="tabs__tab" id="tab_4" data-tab-info>
                <p>This is a test.</p>    
            </div>
        </div>
        <script type="text/javascript">
            const tabs = document.querySelectorAll('[data-tab-value]')
            const tabInfos = document.querySelectorAll('[data-tab-info]')
    
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    const target = document
                        .querySelector(tab.dataset.tabValue);
    
                    tabInfos.forEach(tabInfo => {
                        tabInfo.classList.remove('active')
                    })
                    target.classList.add('active');
                })
            })
        </script>
    </div>
</div>


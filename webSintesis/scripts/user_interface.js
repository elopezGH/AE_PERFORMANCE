const calcularKcal = document.getElementById("calcularKcal");
const menjars = document.getElementById("Menjars");
const inici = document.getElementById("inici");
const container = document.getElementById("user_interface_container");
const menjarsTaula = document.getElementById("menjarsTaula");
const afegirIngesta = document.getElementById("afegir_Ingesta");
calcularKcal.addEventListener("click", () => {
    container.innerHTML = `
        <form id="form">
            <div class="form-group">
                <label for="genere">Sexe</label>
                <select id="genere">
                    <option value="masculi">Masculi</option>
                    <option value="femeni">Femini</option>
                </select>
            </div>
            <div class="form-group">
                <label for="edat">Edat</label>
                <input type="number" id="edat" />
            </div>
            <div class="form-group">
                <label for="pes">Pes</label>
                <input type="number" id="pes" placeholder="Kg"/>
            </div>
            <div class="form-group">
                <label for="altura">Altura</label>
                <input type="number" id="altura" placeholder="Cm"/>
            </div>
            <div class="form-group">
                <label for="nivell_activitat">Nivell d'activitat</label>
                <select id="nivell_activitat">
                    <option value="1.2">Sedentari</option>
                    <option value="1.375">Poca activitat</option>
                    <option value="1.55">Activitat moderada</option>
                    <option value="1.725">Activitat intensa</option>
                    <option value="1.9">Activitat molt intensa</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Calcular!</button>
            </div>
        </form>
        <div class="result-container" id="resultat"></div>
    `;

    const form = document.getElementById('form');
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        var tmb = 0;
        const genere = document.getElementById('genere').value;
        const edat = document.getElementById('edat').value;
        const pes = document.getElementById('pes').value;
        const altura = document.getElementById('altura').value;
        const nivell_activitat = document.getElementById('nivell_activitat').value;
        const result_container = document.getElementById('resultat');
        
        if (genere == 'masculi') {
            tmb = (10 * pes) + (6.25 * altura) - (5 * edat) + 5;
        } else {
            tmb = (10 * pes) + (6.25 * altura) - (5 * edat) - 161;
        }

        console.log(tmb + 'kcal');
        result_container.innerHTML = `
            <p><span>Metabolisme: </span> ${tmb} </p>
            <p><span>Gasto caloric: </span> ${tmb * nivell_activitat} </p>
        `;
        
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../../php/guardarMetabolisme.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send(`tmb=${tmb * nivell_activitat}&nivell_activitat=${nivell_activitat}`);
    });
});

menjars.addEventListener('click', () => {
    container.innerHTML = `
        <form action="../../php/menjars.php" method="post" id="form">
            <div class="form-group">
                <label for="Menjar">Nom del Menjar</label>
                <input name="Menjar" type="text" id="Menjar">
            </div>
            <div class="form-group">
            <label for="Menjar">Kcal</label>
            <input name="kcal" type="text">
        </div>
            <div class="form-group">
                <label for="Carbohidrats">Carbohidrats (100g)</label>
                <input name="Carbohidrats" type="number" id="Carbohidrats" placeholder="g" />
            </div>
            <div class="form-group">
                <label for="proteina">Proteina (100g)</label>
                <input name="proteina" type="number" id="proteina" placeholder="g"/>
            </div>
            <div class="form-group">
                <label for="grases">Grases (100g)</label>
                <input name="grases" type="number" id="grases" placeholder="g"/>
            </div>
            <div class="form-group">
                <button type="submit">Afegir</button>
            </div>
        </form>
    `;
});

inici.addEventListener("click", () => {
    window.location.reload();
});

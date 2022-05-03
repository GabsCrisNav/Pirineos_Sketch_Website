function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

const trigo = ["harinas de trigo", "harinas de alta proteina","alta porteina", "alta porteína", "harinas extrafuertes","extrafuertes", "harinas de fuerza media", "fuerza media", "harinas suaves", "suaves", "harinas integrales","integrales", "marcas"];
const bakery = ["bakery mix","bakerymix", "harinas preparadas", "premezclas", "solución integral", "solucion integral",  "harina para recetas saludables" ];
const hogar=["harinas para el hogar", "harina de trigo san antonio","san antonio","harina integral", "harina de trigo integral","harina integral tres estrellas", "3 estrellas", "tres estrellas", "harina preparada", "harina para hot cakes",  "harina para hotcakes", "harina para pastel", "harina para crepas", "harina para churros"]
const derivados = ["derivados de trigo", "granillo de trigo","germen de trigo", "salvado de trigo", "salvadillo de trigo","salvado de trigo uso forrajero", "salvado de trigo para uso forrajero"];
const rendimix = ["rendimix","harina", "harina panadera", "harina rendidora","mejorante","mejorantes"];
const contacto = ["contacto","distribuidores","direcciones","bolsa de trabajo","trabajo"];
const tecno = ["tecnologia","tecnología","equipo","equipos","laboratorios","laboratorio", "investigacion", "investigación","tratamientos","centros de distribucion", "centros de distribución", "centro de distribucion","calidad", "formacion", "formación","agricultura","apoyos","escolarizacion","escolarización"];
const quienes = ["quienes somos","grupo moderna","los pirineos", "grupo la moderna", "moderna", "pirineos", "harinera los pirineos","segmentos de produccion","produccion","producción","evolución","evolucion"];
function search_input (form) {
    const userInput = form.search_text.value;
    const value = userInput.toLowerCase();

    if (trigo.includes(value)) {
      window.open("harinas_de_trigo.html")
    }
    if (bakery.includes(value)) {
      window.open("Productos.html")
    }
    if (derivados.includes(value)) {
      window.open("derivados_de_trigo.html")
    }
    if (hogar.includes(value)) {
      window.open("harinas_para_el_hogar.html")
    }
    if (rendimix.includes(value)) {
      window.open("Productos_RendiMix.html")
    }
    if (contacto.includes(value)) {
      window.open("Contacto.html")
    }
    if (tecno.includes(value)) {
      window.open("reto_pilares.html")
    }
    if (quienes.includes(value)) {
      window.open("quienes_somos_ver_1.html")
    }
    else {
      window.open("Index.html");
    }
};

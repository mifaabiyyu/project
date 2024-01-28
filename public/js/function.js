function convertToSlug(Text) {
    randomString = "";
    if (Text.length != 0) {
        var randomString = "-" + Math.random().toString(36).slice(2, 7);
    }
    var text = Text.toLowerCase()
        .replace(/ /g, "-")
        .replace(/[^\w-]+/g, "");

    var data = text + randomString;
    return data;
}

const rupiah = (number) => {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
    }).format(number);
};

function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

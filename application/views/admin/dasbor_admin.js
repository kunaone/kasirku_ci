function buatDiagramBatang(opsi) {
  var bawaan = {
    barColors: ['#337ab7', '#5cb85c', '#f0ad4e', '#d9534f'], // warna Bootstrap 3
    barRatio: 0.4,
    xLabelAngle: 0,
    hideHover: 'auto',
    resize: true,          // ikut responsif saat layar berubah
    gridTextSize: 12
  };
  return Morris.Bar($.extend({}, bawaan, opsi));
}

/* --------------------------------------------------------------
   CONTOH 1: dasar
   -------------------------------------------------------------- */
buatDiagramBatang({
  element: 'chart-dasar',                 // harus sama dengan id <div>
  data: [
    { bulan: 'Jan', penjualan: 120 },
    { bulan: 'Feb', penjualan: 200 },
    { bulan: 'Mar', penjualan: 150 },
    { bulan: 'Apr', penjualan: 280 },
    { bulan: 'Mei', penjualan: 240 }
  ],
  xkey: 'bulan',                          // field untuk sumbu X
  ykeys: ['penjualan'],                   // field untuk tinggi batang
  labels: ['Penjualan']                   // label saat hover
});
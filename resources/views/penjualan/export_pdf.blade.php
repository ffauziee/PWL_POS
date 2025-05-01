<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffffff;
            color: #333;
            line-height: 1.6;
            font-size: 10pt;
        }
        
        /* Header section */
        .report-header {
            padding: 30px 20px;
            background-color: #2c3e50;
            color: #ffffff;
            text-align: center;
            position: relative;
        }
        
        .report-title {
            font-size: 24pt;
            font-weight: 700;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .report-subtitle {
            font-size: 12pt;
            font-weight: 300;
            margin-bottom: 15px;
        }
        
        .institution-logo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #e74c3c;
            color: white;
            font-size: 36pt;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
        }
        
        /* Document info bar */
        .document-info {
            background-color: #f5f5f5;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            border-bottom: 3px solid #e74c3c;
            color: #555;
        }
        
        .document-info-item {
            display: flex;
            flex-direction: column;
        }
        
        .info-label {
            font-size: 8pt;
            text-transform: uppercase;
            color: #888;
        }
        
        .info-value {
            font-size: 10pt;
            font-weight: bold;
        }
        
        /* Content container */
        .content-container {
            padding: 20px 25px;
        }
        
        /* Summary section */
        .summary-section {
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
        }
        
        .summary-box {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            width: 31%;
            text-align: center;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        
        .summary-value {
            font-size: 20pt;
            font-weight: bold;
            color: #e74c3c;
            margin-bottom: 5px;
        }
        
        .summary-label {
            font-size: 9pt;
            color: #777;
            text-transform: uppercase;
        }
        
        /* Table styling */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        
        .data-table th {
            background-color: #34495e;
            color: white;
            font-weight: 600;
            text-align: left;
            padding: 12px 15px;
            font-size: 9pt;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .data-table td {
            padding: 10px 15px;
            border-bottom: 1px solid #ddd;
            font-size: 9pt;
            vertical-align: top;
        }
        
        .data-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        .data-table tr:hover td {
            background-color: #f1f1f1;
        }
        
        /* Nested product table */
        .product-detail-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
            font-size: 8pt;
        }
        
        .product-detail-table th {
            background-color: #eee;
            color: #555;
            padding: 5px;
            text-transform: none;
            letter-spacing: normal;
            font-weight: 600;
            text-align: left;
            border: none;
        }
        
        .product-detail-table td {
            padding: 5px;
            border-bottom: 1px dotted #ddd;
            vertical-align: middle;
        }
        
        /* Text utilities */
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        
        /* Special styling */
        .transaction-code {
            font-family: monospace;
            color: #2980b9;
            font-weight: bold;
        }
        
        .total-amount {
            font-weight: bold;
            color: #e74c3c;
        }
        
        /* Signature section */
        .signature-section {
            margin-top: 40px;
            text-align: right;
        }
        
        .signature-title {
            font-size: 10pt;
            color: #555;
            margin-bottom: 5px;
        }
        
        .signature-blocks {
            display: flex;
            justify-content: flex-end;
            gap: 50px;
        }
        
        .signature-block {
            width: 180px;
            text-align: center;
        }
        
        .signature-role {
            font-size: 9pt;
            color: #777;
            margin-bottom: 50px;
        }
        
        .signature-name {
            font-weight: bold;
            border-top: 1px solid #555;
            padding-top: 8px;
        }
        
        .signature-date {
            font-size: 8pt;
            color: #777;
            margin-top: 5px;
        }
        
        /* Footer */
        .document-footer {
            position: fixed;
            bottom: 20px;
            right: 20px;
            font-size: 8pt;
            color: #888;
        }
        
        /* Institution info in footer */
        .institution-footer {
            position: fixed;
            bottom: 20px;
            left: 20px;
            font-size: 8pt;
            color: #888;
            text-align: left;
        }
        
        /* PDF settings */
        @page {
            margin: 0;
            size: landscape;
        }
    </style>
</head>

<body>
    <!-- Header section -->
    <div class="report-header">
        <div class="institution-logo">P</div>
        <div class="report-title">Laporan Penjualan</div>
        <div class="report-subtitle">POLITEKNIK NEGERI MALANG</div>
    </div>
    
    <!-- Document info bar -->
    <div class="document-info">
        <div class="document-info-item">
            <span class="info-label">Nomor Dokumen</span>
            <span class="info-value">SLS/{{ date('Ymd') }}/{{ rand(100, 999) }}</span>
        </div>
        <div class="document-info-item">
            <span class="info-label">Tanggal Laporan</span>
            <span class="info-value">{{ date('d M Y') }}</span>
        </div>
        <div class="document-info-item">
            <span class="info-label">Periode</span>
            <span class="info-value">{{ date('M Y') }}</span>
        </div>
        <div class="document-info-item">
            <span class="info-label">Dibuat Oleh</span>
            <span class="info-value">{{ auth()->user()->name ?? 'Administrator' }}</span>
        </div>
    </div>
    
    <!-- Content container -->
    <div class="content-container">
        <!-- Summary section -->
        <div class="summary-section">
            <div class="summary-box">
                <div class="summary-value">{{ count($data) }}</div>
                <div class="summary-label">Total Transaksi</div>
            </div>
            <div class="summary-box">
                <div class="summary-value">{{ $data->sum('penjualan_detail->count') ?? '0' }}</div>
                <div class="summary-label">Item Terjual</div>
            </div>
            <div class="summary-box">
                <div class="summary-value">{{ 'Rp ' . number_format($data->sum('penjualan_detail_sum_harga') ?? 0, 0, ',', '.') }}</div>
                <div class="summary-label">Total Penjualan</div>
            </div>
        </div>
        
        <!-- Data table -->
        <table class="data-table">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="13%">Kode Transaksi</th>
                    <th width="15%">Pelanggan</th>
                    <th width="12%">Petugas</th>
                    <th width="32%">Detail Produk</th>
                    <th width="12%" class="text-right">Total</th>
                    <th width="11%">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="transaction-code">{{ $d->penjualan_kode }}</td>
                    <td>{{ $d->pembeli }}</td>
                    <td>{{ $d->user->username }}</td>
                    <td>
                        <table class="product-detail-table">
                            <thead>
                                <tr>
                                    <th width="50%">Produk</th>
                                    <th width="15%" class="text-center">Qty</th>
                                    <th width="15%" class="text-right">Harga</th>
                                    <th width="20%" class="text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($d->penjualan_detail as $pd)
                                @php
                                    $totalPerBarang = $pd->jumlah * $pd->harga;
                                @endphp
                                <tr>
                                    <td>{{ $pd->barang->barang_nama }}</td>
                                    <td class="text-center">{{ $pd->jumlah }}</td>
                                    <td class="text-right">{{ number_format($pd->harga, 0, ',', '.') }}</td>
                                    <td class="text-right">{{ number_format($totalPerBarang, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td class="total-amount text-right">{{ 'Rp ' . number_format($d->penjualan_detail_sum_harga, 0, ',', '.') }}</td>
                    <td>{{ date('d/m/Y', strtotime($d->penjualan_tanggal)) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- Signature section -->
        <div class="signature-section">
            <div class="signature-title">Pengesahan Laporan</div>
            <div class="signature-blocks">
                <div class="signature-block">
                    <div class="signature-role">Petugas Administrasi</div>
                    <div class="signature-name">{{ auth()->user()->name ?? 'Admin Sistem' }}</div>
                    <div class="signature-date">{{ date('d/m/Y') }}</div>
                </div>
                <div class="signature-block">
                    <div class="signature-role">Kepala Departemen</div>
                    <div class="signature-name">Dr. Suhartono, M.Kom</div>
                    <div class="signature-date">{{ date('d/m/Y') }}</div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Institution info in footer -->
    <div class="institution-footer">
        Politeknik Negeri Malang<br>
        Jl. Soekarno-Hatta No. 9, Malang 65141
    </div>
    
    <!-- Footer with page number -->
    <div class="document-footer">
        Halaman {PAGE_NUM} dari {PAGE_COUNT}
    </div>

    <!-- PDF page numbering script -->
    <script type="text/php">
        if (isset($pdf)) {
            $text = "Halaman {PAGE_NUM} dari {PAGE_COUNT}";
            $size = 8;
            $font = $fontMetrics->getFont("Arial");
            $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
            $x = ($pdf->get_width() - $width) / 2;
            $y = $pdf->get_height() - 35;
            $pdf->page_text($x, $y, $text, $font, $size);
        }
    </script>
</body>
</html>
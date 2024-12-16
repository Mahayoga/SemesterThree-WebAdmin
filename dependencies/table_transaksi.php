<?php

$nama_tabel = "transaksi";

$sql = "
    CREATE TABLE `$nama_tabel` (
    `id_transaksi` int(11) NOT NULL,
    `total` int(11) NOT NULL,
    `bayar` int(11) NOT NULL,
    `kembalian` int(11) NOT NULL,
    `method_pembayaran` enum('cash','dana','ovo') NOT NULL,
    `id_user` int(11) NOT NULL,
    `id_karyawan` int(11) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
    )
";

if ($koneksi->query($sql) === true) {
    echo "Tabel dibuat!: $nama_tabel <br>";
} else {
    echo "Error: saat membuat tabel $nama_tabel<br>";
}

$sql = "
    INSERT INTO `transaksi` VALUES
    (1, 20000, 500000, 480000, 'ovo', 10, 1, null, null),
    (2, 80000, 500000, 420000, 'cash', 50, 2, null, null),
    (3, 120000, 500000, 380000, 'cash', 28, 1, null, null),
    (4, 90000, 500000, 410000, 'cash', 1, 1, null, null),
    (5, 25000, 500000, 475000, 'dana', 67, 1, null, null),
    (6, 45000, 500000, 455000, 'ovo', 15, 1, null, null),
    (7, 30000, 500000, 470000, 'cash', 6, 2, null, null),
    (8, 30000, 500000, 470000, 'cash', 54, 1, null, null),
    (9, 25000, 500000, 475000, 'dana', 28, 2, null, null),
    (10, 20000, 500000, 480000, 'cash', 15, 2, null, null),
    (11, 20000, 500000, 480000, 'ovo', 65, 1, null, null),
    (12, 80000, 500000, 420000, 'ovo', 66, 1, null, null),
    (13, 30000, 500000, 470000, 'ovo', 66, 2, null, null),
    (14, 90000, 500000, 410000, 'ovo', 24, 1, null, null),
    (15, 25000, 500000, 475000, 'ovo', 71, 2, null, null),
    (16, 80000, 500000, 420000, 'ovo', 61, 2, null, null),
    (17, 40000, 500000, 460000, 'dana', 14, 1, null, null),
    (18, 135000, 500000, 365000, 'cash', 33, 1, null, null),
    (19, 120000, 500000, 380000, 'ovo', 62, 2, null, null),
    (20, 30000, 500000, 470000, 'cash', 44, 1, null, null),
    (21, 20000, 500000, 480000, 'dana', 18, 1, null, null),
    (22, 80000, 500000, 420000, 'dana', 45, 2, null, null),
    (23, 30000, 500000, 470000, 'dana', 8, 1, null, null),
    (24, 25000, 500000, 475000, 'dana', 13, 1, null, null),
    (25, 25000, 500000, 475000, 'cash', 68, 1, null, null),
    (26, 80000, 500000, 420000, 'ovo', 31, 1, null, null),
    (27, 80000, 500000, 420000, 'cash', 32, 2, null, null),
    (28, 80000, 500000, 420000, 'ovo', 34, 1, null, null),
    (29, 80000, 500000, 420000, 'cash', 55, 2, null, null),
    (30, 20000, 500000, 480000, 'dana', 27, 2, null, null),
    (31, 25000, 500000, 475000, 'dana', 44, 2, null, null),
    (32, 25000, 500000, 475000, 'cash', 2, 2, null, null),
    (33, 20000, 500000, 480000, 'ovo', 73, 2, null, null),
    (34, 120000, 500000, 380000, 'dana', 15, 2, null, null),
    (35, 80000, 500000, 420000, 'cash', 34, 2, null, null),
    (36, 80000, 500000, 420000, 'cash', 27, 1, null, null),
    (37, 80000, 500000, 420000, 'dana', 63, 2, null, null),
    (38, 20000, 500000, 480000, 'ovo', 34, 1, null, null),
    (39, 90000, 500000, 410000, 'dana', 34, 2, null, null),
    (40, 20000, 500000, 480000, 'cash', 26, 1, null, null),
    (41, 20000, 500000, 480000, 'ovo', 30, 2, null, null),
    (42, 20000, 500000, 480000, 'cash', 28, 2, null, null),
    (43, 20000, 500000, 480000, 'dana', 52, 1, null, null),
    (44, 45000, 500000, 455000, 'cash', 37, 2, null, null),
    (45, 20000, 500000, 480000, 'ovo', 69, 2, null, null),
    (46, 40000, 500000, 460000, 'ovo', 63, 1, null, null),
    (47, 45000, 500000, 455000, 'cash', 37, 1, null, null),
    (48, 25000, 500000, 475000, 'ovo', 37, 1, null, null),
    (49, 30000, 500000, 470000, 'ovo', 70, 1, null, null),
    (50, 45000, 500000, 455000, 'ovo', 57, 2, null, null),
    (51, 45000, 500000, 455000, 'cash', 33, 2, null, null),
    (52, 80000, 500000, 420000, 'ovo', 36, 1, null, null),
    (53, 20000, 500000, 480000, 'cash', 1, 2, null, null),
    (54, 90000, 500000, 410000, 'dana', 7, 2, null, null),
    (55, 20000, 500000, 480000, 'ovo', 27, 1, null, null),
    (56, 25000, 500000, 475000, 'cash', 72, 2, null, null),
    (57, 30000, 500000, 470000, 'dana', 64, 1, null, null),
    (58, 20000, 500000, 480000, 'ovo', 14, 1, null, null),
    (59, 25000, 500000, 475000, 'cash', 38, 1, null, null),
    (60, 90000, 500000, 410000, 'ovo', 39, 2, null, null),
    (61, 120000, 500000, 380000, 'dana', 63, 1, null, null),
    (62, 30000, 500000, 470000, 'dana', 22, 2, null, null),
    (63, 30000, 500000, 470000, 'ovo', 8, 1, null, null),
    (64, 30000, 500000, 470000, 'dana', 10, 2, null, null),
    (65, 80000, 500000, 420000, 'cash', 32, 2, null, null),
    (66, 25000, 500000, 475000, 'cash', 64, 1, null, null),
    (67, 45000, 500000, 455000, 'cash', 54, 2, null, null),
    (68, 20000, 500000, 480000, 'cash', 3, 1, null, null),
    (69, 25000, 500000, 475000, 'cash', 35, 2, null, null),
    (70, 80000, 500000, 420000, 'dana', 28, 1, null, null),
    (71, 25000, 500000, 475000, 'ovo', 28, 2, null, null),
    (72, 45000, 500000, 455000, 'ovo', 30, 1, null, null),
    (73, 120000, 500000, 380000, 'dana', 51, 2, null, null),
    (74, 30000, 500000, 470000, 'ovo', 2, 2, null, null),
    (75, 80000, 500000, 420000, 'cash', 48, 1, null, null),
    (76, 25000, 500000, 475000, 'dana', 17, 1, null, null),
    (77, 20000, 500000, 480000, 'dana', 25, 1, null, null),
    (78, 30000, 500000, 470000, 'ovo', 43, 1, null, null),
    (79, 25000, 500000, 475000, 'dana', 26, 1, null, null),
    (80, 20000, 500000, 480000, 'dana', 15, 1, null, null),
    (81, 25000, 500000, 475000, 'cash', 32, 1, null, null),
    (82, 80000, 500000, 420000, 'ovo', 11, 1, null, null),
    (83, 20000, 500000, 480000, 'cash', 43, 2, null, null),
    (84, 80000, 500000, 420000, 'dana', 15, 1, null, null),
    (85, 30000, 500000, 470000, 'dana', 67, 2, null, null),
    (86, 90000, 500000, 410000, 'cash', 32, 2, null, null),
    (87, 20000, 500000, 480000, 'dana', 26, 1, null, null),
    (88, 90000, 500000, 410000, 'dana', 13, 1, null, null),
    (89, 25000, 500000, 475000, 'dana', 43, 2, null, null),
    (90, 45000, 500000, 455000, 'ovo', 56, 2, null, null),
    (91, 80000, 500000, 420000, 'dana', 35, 1, null, null),
    (92, 20000, 500000, 480000, 'ovo', 57, 1, null, null),
    (93, 40000, 500000, 460000, 'cash', 17, 1, null, null),
    (94, 20000, 500000, 480000, 'ovo', 10, 1, null, null),
    (95, 30000, 500000, 470000, 'cash', 32, 2, null, null),
    (96, 25000, 500000, 475000, 'cash', 41, 1, null, null),
    (97, 80000, 500000, 420000, 'dana', 68, 2, null, null),
    (98, 25000, 500000, 475000, 'dana', 72, 1, null, null),
    (99, 40000, 500000, 460000, 'dana', 58, 2, null, null),
    (100, 45000, 500000, 455000, 'dana', 52, 2, null, null),
    (101, 25000, 500000, 475000, 'cash', 50, 2, null, null),
    (102, 120000, 500000, 380000, 'cash', 15, 2, null, null),
    (103, 30000, 500000, 470000, 'ovo', 49, 2, null, null),
    (104, 90000, 500000, 410000, 'cash', 29, 2, null, null),
    (105, 20000, 500000, 480000, 'dana', 33, 1, null, null),
    (106, 25000, 500000, 475000, 'dana', 40, 1, null, null),
    (107, 25000, 500000, 475000, 'cash', 62, 2, null, null),
    (108, 25000, 500000, 475000, 'cash', 35, 1, null, null),
    (109, 45000, 500000, 455000, 'cash', 11, 2, null, null),
    (110, 45000, 500000, 455000, 'ovo', 6, 2, null, null),
    (111, 40000, 500000, 460000, 'dana', 63, 1, null, null),
    (112, 90000, 500000, 410000, 'ovo', 17, 1, null, null),
    (113, 120000, 500000, 380000, 'cash', 59, 1, null, null),
    (114, 25000, 500000, 475000, 'ovo', 45, 1, null, null),
    (115, 25000, 500000, 475000, 'dana', 71, 1, null, null),
    (116, 45000, 500000, 455000, 'cash', 11, 2, null, null),
    (117, 25000, 500000, 475000, 'ovo', 9, 2, null, null),
    (118, 135000, 500000, 365000, 'ovo', 5, 2, null, null),
    (119, 20000, 500000, 480000, 'ovo', 11, 2, null, null),
    (120, 20000, 500000, 480000, 'cash', 39, 2, null, null),
    (121, 20000, 500000, 480000, 'cash', 4, 2, null, null),
    (122, 45000, 500000, 455000, 'ovo', 40, 1, null, null),
    (123, 20000, 500000, 480000, 'ovo', 57, 2, null, null),
    (124, 120000, 500000, 380000, 'dana', 20, 1, null, null),
    (125, 135000, 500000, 365000, 'cash', 71, 1, null, null),
    (126, 25000, 500000, 475000, 'dana', 10, 2, null, null),
    (127, 30000, 500000, 470000, 'dana', 32, 2, null, null),
    (128, 135000, 500000, 365000, 'dana', 68, 2, null, null),
    (129, 20000, 500000, 480000, 'dana', 20, 1, null, null),
    (130, 90000, 500000, 410000, 'ovo', 60, 2, null, null),
    (131, 30000, 500000, 470000, 'dana', 41, 1, null, null),
    (132, 40000, 500000, 460000, 'dana', 30, 1, null, null),
    (133, 135000, 500000, 365000, 'ovo', 24, 1, null, null),
    (134, 20000, 500000, 480000, 'ovo', 8, 1, null, null),
    (135, 120000, 500000, 380000, 'ovo', 13, 2, null, null),
    (136, 90000, 500000, 410000, 'dana', 7, 2, null, null),
    (137, 40000, 500000, 460000, 'dana', 55, 2, null, null),
    (138, 135000, 500000, 365000, 'dana', 15, 2, null, null),
    (139, 135000, 500000, 365000, 'cash', 12, 2, null, null),
    (140, 80000, 500000, 420000, 'ovo', 42, 1, null, null),
    (141, 120000, 500000, 380000, 'dana', 59, 2, null, null),
    (142, 120000, 500000, 380000, 'cash', 29, 2, null, null),
    (143, 90000, 500000, 410000, 'dana', 37, 2, null, null),
    (144, 90000, 500000, 410000, 'cash', 31, 2, null, null),
    (145, 20000, 500000, 480000, 'dana', 30, 2, null, null),
    (146, 20000, 500000, 480000, 'dana', 57, 1, null, null),
    (147, 20000, 500000, 480000, 'ovo', 44, 2, null, null),
    (148, 25000, 500000, 475000, 'ovo', 5, 2, null, null),
    (149, 45000, 500000, 455000, 'dana', 31, 2, null, null),
    (150, 20000, 500000, 480000, 'cash', 26, 2, null, null),
    (151, 20000, 500000, 480000, 'cash', 72, 2, null, null),
    (152, 20000, 500000, 480000, 'dana', 32, 1, null, null),
    (153, 40000, 500000, 460000, 'ovo', 55, 2, null, null),
    (154, 40000, 500000, 460000, 'ovo', 64, 1, null, null),
    (155, 90000, 500000, 410000, 'dana', 25, 1, null, null),
    (156, 40000, 500000, 460000, 'ovo', 15, 1, null, null),
    (157, 80000, 500000, 420000, 'ovo', 68, 1, null, null),
    (158, 40000, 500000, 460000, 'ovo', 24, 2, null, null),
    (159, 80000, 500000, 420000, 'cash', 68, 1, null, null),
    (160, 20000, 500000, 480000, 'cash', 55, 2, null, null),
    (161, 80000, 500000, 420000, 'cash', 60, 2, null, null),
    (162, 20000, 500000, 480000, 'ovo', 62, 2, null, null),
    (163, 135000, 500000, 365000, 'ovo', 26, 2, null, null),
    (164, 40000, 500000, 460000, 'dana', 36, 1, null, null),
    (165, 25000, 500000, 475000, 'ovo', 37, 2, null, null),
    (166, 25000, 500000, 475000, 'ovo', 14, 2, null, null),
    (167, 90000, 500000, 410000, 'dana', 20, 1, null, null),
    (168, 45000, 500000, 455000, 'ovo', 23, 1, null, null),
    (169, 25000, 500000, 475000, 'dana', 68, 1, null, null),
    (170, 40000, 500000, 460000, 'ovo', 7, 1, null, null),
    (171, 80000, 500000, 420000, 'ovo', 13, 1, null, null),
    (172, 120000, 500000, 380000, 'ovo', 38, 1, null, null),
    (173, 90000, 500000, 410000, 'cash', 63, 1, null, null),
    (174, 30000, 500000, 470000, 'cash', 23, 1, null, null),
    (175, 20000, 500000, 480000, 'dana', 57, 1, null, null),
    (176, 20000, 500000, 480000, 'cash', 19, 1, null, null),
    (177, 40000, 500000, 460000, 'dana', 39, 2, null, null),
    (178, 120000, 500000, 380000, 'ovo', 55, 2, null, null),
    (179, 20000, 500000, 480000, 'cash', 59, 1, null, null),
    (180, 120000, 500000, 380000, 'ovo', 66, 1, null, null),
    (181, 45000, 500000, 455000, 'cash', 16, 2, null, null),
    (182, 25000, 500000, 475000, 'dana', 14, 2, null, null),
    (183, 30000, 500000, 470000, 'ovo', 61, 2, null, null),
    (184, 30000, 500000, 470000, 'dana', 60, 2, null, null),
    (185, 25000, 500000, 475000, 'ovo', 16, 1, null, null),
    (186, 90000, 500000, 410000, 'dana', 54, 1, null, null),
    (187, 135000, 500000, 365000, 'dana', 38, 2, null, null),
    (188, 20000, 500000, 480000, 'ovo', 58, 1, null, null),
    (189, 20000, 500000, 480000, 'dana', 29, 2, null, null),
    (190, 80000, 500000, 420000, 'cash', 60, 1, null, null),
    (191, 30000, 500000, 470000, 'ovo', 55, 1, null, null),
    (192, 135000, 500000, 365000, 'cash', 31, 2, null, null),
    (193, 45000, 500000, 455000, 'ovo', 51, 2, null, null),
    (194, 120000, 500000, 380000, 'ovo', 49, 1, null, null),
    (195, 90000, 500000, 410000, 'dana', 67, 1, null, null),
    (196, 20000, 500000, 480000, 'cash', 71, 1, null, null),
    (197, 20000, 500000, 480000, 'dana', 50, 1, null, null),
    (198, 25000, 500000, 475000, 'cash', 7, 1, null, null),
    (199, 30000, 500000, 470000, 'ovo', 23, 2, null, null),
    (200, 120000, 500000, 380000, 'cash', 57, 2, null, null);
";

if ($koneksi->query($sql) === true) {
    echo "Seeder dibuat!: $nama_tabel <br>";
} else {
    echo "Error: saat membuat seeder $nama_tabel<br>";
}
/**
 * Bloque 4 (/departamentos): Explorador Geográfico Realista de Distritos en Arequipa
 * Base cartográfica Google Maps + Polígonos Oficiales GeoJSON (Yanahuara, Cayma, Cerro Colorado)
 */
(function () {
    const viewport = document.getElementById('depasMapViewport');
    const stage    = document.getElementById('depasMapStage');
    if (!viewport || !stage) return;

    const DISTRICTS_POLY = {"yanahuara":[[[749.2,1269.2],[752.5,1279.3],[754.1,1284.8],[759.4,1287.6],[786.5,1301.4],[790.3,1304.5],[820.1,1319.3],[825.4,1322.3],[839.4,1334.2],[841.7,1330.1],[844.5,1330.9],[853.6,1332.3],[862.0,1333.2],[869.5,1333.8],[879.0,1331.3],[884.7,1328.6],[895.5,1325.8],[902.1,1323.9],[907.7,1323.3],[913.5,1323.8],[914.0,1322.0],[916.4,1316.9],[918.3,1312.8],[919.0,1310.9],[922.4,1302.3],[921.1,1297.9],[918.8,1289.6],[916.7,1282.2],[915.7,1278.8],[913.6,1270.6],[914.1,1268.4],[915.1,1266.2],[921.7,1263.9],[924.5,1259.2],[930.0,1246.7],[932.1,1242.7],[934.6,1237.7],[940.7,1227.2],[947.4,1219.1],[956.0,1208.7],[963.6,1200.1],[968.3,1193.5],[969.6,1189.6],[969.8,1187.2],[969.1,1184.3],[970.0,1181.8],[972.4,1180.6],[975.0,1179.1],[976.0,1176.5],[979.6,1176.2],[981.9,1177.0],[986.5,1179.8],[990.1,1171.3],[993.0,1172.8],[1000.0,1176.4],[1003.0,1168.7],[1009.9,1149.9],[1011.3,1146.3],[1016.3,1146.1],[1021.4,1146.4],[1026.4,1146.4],[1029.7,1146.4],[1033.0,1145.4],[1034.5,1143.1],[1037.3,1143.1],[1041.4,1144.9],[1044.0,1142.1],[1047.2,1136.1],[1049.9,1132.4],[1051.6,1131.4],[1060.2,1133.6],[1061.9,1129.4],[1073.9,1092.6],[1076.9,1083.4],[1078.5,1080.4],[1083.5,1064.9],[1084.1,1063.1],[1087.5,1052.9],[1090.6,1042.6],[1094.9,1029.6],[1095.5,1024.1],[1097.4,1018.6],[1099.8,1017.1],[1102.9,1017.6],[1106.1,1017.7],[1108.6,1012.1],[1110.5,1007.2],[1113.9,1006.4],[1117.3,1006.5],[1119.8,1003.8],[1121.8,985.1],[1124.3,973.8],[1126.7,963.8],[1129.8,957.8],[1132.9,952.2],[1134.9,944.2],[1139.0,920.5],[1141.5,910.9],[1138.5,902.6],[1128.7,876.9],[1126.5,869.6],[1120.1,841.3],[1119.9,831.8],[1112.8,830.1],[1110.8,828.1],[1107.4,829.6],[1105.6,834.1],[1104.7,836.5],[1107.3,849.9],[1103.7,857.3],[1108.4,864.9],[1107.6,878.1],[1106.4,880.9],[1106.8,883.4],[1105.7,891.0],[1108.4,917.3],[1107.3,935.5],[1101.6,953.1],[1097.8,966.1],[1096.3,972.8],[1093.4,979.7],[1088.5,990.5],[1084.2,996.4],[1080.9,1003.2],[1079.1,1006.6],[1075.6,1009.4],[1073.6,1012.4],[1073.3,1016.5],[1071.3,1023.1],[1067.4,1025.2],[1060.3,1024.5],[1057.5,1034.3],[1043.5,1032.4],[1036.7,1031.4],[1031.2,1027.4],[1030.1,1025.8],[1029.0,1023.7],[1026.4,1027.6],[1024.6,1034.0],[1018.6,1052.5],[1009.4,1049.4],[1003.3,1047.3],[1002.1,1050.6],[998.3,1062.2],[992.2,1080.9],[985.2,1101.5],[991.9,1103.1],[987.1,1114.0],[989.4,1119.9],[985.3,1130.0],[982.8,1130.5],[974.8,1132.9],[971.9,1134.3],[965.1,1137.7],[955.7,1143.2],[949.8,1144.9],[946.1,1144.5],[942.6,1143.2],[940.3,1141.8],[936.7,1139.4],[933.1,1136.5],[931.2,1133.9],[930.9,1128.3],[931.1,1125.0],[930.7,1123.1],[929.2,1120.6],[926.9,1118.7],[924.9,1117.7],[921.8,1116.6],[919.6,1115.8],[917.7,1115.2],[915.0,1115.0],[911.0,1114.1],[908.4,1114.4],[904.5,1114.5],[902.5,1115.0],[900.8,1116.1],[899.0,1117.5],[894.5,1124.7],[891.0,1127.0],[882.7,1130.7],[876.2,1133.0],[869.3,1135.0],[867.8,1136.5],[843.9,1147.8],[831.1,1153.7],[828.8,1158.6],[828.3,1163.4],[826.5,1176.0],[829.5,1187.6],[829.5,1199.2],[822.8,1206.8],[806.3,1215.9],[780.2,1233.5],[757.9,1250.8],[749.2,1269.2]]],"cayma":[[[864.1,568.1],[864.9,572.0],[866.1,575.3],[870.8,582.6],[878.2,588.5],[880.9,591.3],[889.0,602.5],[899.2,614.6],[897.7,622.3],[899.5,631.5],[896.7,638.8],[894.5,646.0],[894.2,650.6],[897.1,667.4],[900.4,680.6],[900.5,689.8],[898.6,696.3],[896.6,699.4],[895.3,703.7],[891.6,710.8],[889.2,717.2],[888.0,725.7],[887.8,737.1],[890.3,750.2],[891.8,753.2],[896.8,769.4],[901.2,801.3],[900.7,813.1],[901.5,819.2],[904.3,831.3],[908.1,842.2],[909.4,847.0],[915.6,868.9],[916.4,882.5],[916.0,885.9],[913.0,894.2],[900.2,911.3],[896.6,917.8],[890.3,939.4],[890.3,948.3],[890.7,952.7],[891.2,957.1],[891.9,959.7],[897.6,969.5],[899.9,972.4],[905.9,982.2],[909.7,998.4],[914.2,1004.2],[915.3,1008.7],[913.4,1023.8],[910.2,1031.7],[908.2,1040.5],[908.2,1043.8],[909.2,1048.7],[911.3,1054.1],[915.0,1059.9],[917.4,1066.1],[921.4,1082.2],[922.4,1093.9],[922.7,1107.0],[922.0,1111.1],[921.8,1116.6],[924.9,1117.7],[926.9,1118.7],[929.2,1120.6],[930.7,1123.1],[931.1,1125.0],[930.9,1128.3],[931.1,1132.7],[933.1,1136.5],[936.7,1139.4],[940.3,1141.8],[942.6,1143.2],[946.1,1144.5],[949.8,1144.9],[955.7,1143.2],[965.1,1137.7],[971.9,1134.3],[974.8,1132.9],[982.8,1130.5],[985.3,1130.0],[989.4,1119.9],[987.1,1114.0],[991.9,1103.1],[985.2,1101.5],[992.2,1080.9],[998.3,1062.2],[1002.1,1050.6],[1003.3,1047.3],[1009.4,1049.4],[1018.6,1052.5],[1024.6,1034.0],[1026.4,1027.6],[1028.0,1024.2],[1030.1,1025.8],[1031.2,1027.4],[1036.7,1031.4],[1043.5,1032.4],[1057.5,1034.3],[1060.3,1024.5],[1067.4,1025.2],[1071.3,1023.1],[1073.3,1016.5],[1073.6,1012.4],[1075.6,1009.4],[1079.1,1006.6],[1080.9,1003.2],[1084.2,996.4],[1088.5,990.5],[1093.4,979.7],[1096.3,972.8],[1097.8,966.1],[1101.6,953.1],[1107.3,935.5],[1108.4,917.3],[1105.7,891.0],[1106.8,883.4],[1106.4,880.9],[1107.6,878.5],[1108.4,864.9],[1103.7,857.3],[1107.3,849.9],[1104.7,836.5],[1105.6,834.1],[1107.4,829.6],[1110.8,828.1],[1109.6,826.0],[1102.9,813.8],[1102.4,806.1],[1098.6,797.9],[1096.9,794.2],[1095.9,791.4],[1095.3,785.1],[1098.9,776.9],[1100.6,768.2],[1098.8,761.6],[1098.8,758.1],[1098.2,746.5],[1099.3,743.1],[1098.2,740.1],[1096.4,730.7],[1094.5,727.7],[1094.9,724.9],[1102.9,719.0],[1107.5,713.4],[1109.2,707.3],[1109.0,702.0],[1109.6,699.4],[1109.7,694.3],[1105.1,688.6],[1103.5,686.2],[1101.5,684.5],[1100.9,679.0],[1098.0,676.8],[1094.1,673.0],[1093.4,666.0],[1098.3,659.0],[1097.8,651.6],[1103.1,645.2],[1103.6,640.0],[1106.3,634.4],[1108.9,631.4],[1109.4,619.9],[1108.6,583.8],[1105.9,567.7],[1110.3,551.7],[1116.7,540.6],[1117.0,529.9],[1113.0,520.3],[1115.4,507.4],[1115.0,497.1],[1112.9,490.9],[1126.4,478.8],[1129.6,470.4],[1127.1,454.2],[1126.9,445.7],[1126.9,442.1],[1122.7,436.0],[1126.5,431.3],[1136.9,429.5],[1140.4,423.6],[1141.0,416.0],[1140.6,402.5],[1154.7,386.9],[1158.2,380.4],[1161.2,370.8],[1165.1,366.3],[1169.8,359.2],[1173.5,351.8],[1177.2,348.9],[1186.9,340.4],[1190.7,336.7],[1199.3,323.5],[1205.1,318.6],[1215.6,314.1],[1221.3,310.9],[1230.3,304.8],[1237.5,303.5],[1240.6,306.6],[1250.1,306.6],[1258.2,303.1],[1271.7,301.7],[1277.6,299.0],[1290.4,277.3],[1301.5,274.5],[1308.7,272.8],[1314.5,268.2],[1316.8,263.6],[1320.7,246.1],[1323.9,242.4],[1326.7,240.7],[1334.8,239.0],[1344.1,233.0],[1346.3,231.2],[1355.0,235.8],[1362.9,235.1],[1373.0,233.7],[1383.7,233.8],[1393.4,230.2],[1404.7,216.2],[1421.2,211.1],[1430.8,217.0],[1445.5,213.3],[1451.8,202.1],[1458.2,191.2],[1463.7,186.6],[1468.4,181.7],[1469.7,168.9],[1474.3,160.0],[1476.6,155.4],[1478.5,154.3],[1483.4,153.0],[1501.9,153.3],[1528.9,152.0],[1548.7,146.6],[1566.4,145.1],[1583.7,147.2],[1587.8,148.1],[1598.7,145.9],[1608.9,138.7],[1611.5,131.7],[1616,126.9],[1616.0,-80],[945.4,-80],[945.4,-78.7],[946.8,-76.1],[949.0,-68.3],[947.9,-65.4],[947.3,-63.3],[945.3,-62.9],[946.2,-59.5],[953.4,-34.2],[955.2,-24.1],[957.0,-1.3],[959.6,14.6],[958.8,19.5],[959.7,23.2],[960.7,26.5],[959.9,28.5],[960.2,35.6],[959.1,40.9],[959.2,45.8],[976.5,71.2],[980.4,77.0],[1009.4,100.0],[1008.7,116.8],[990.1,150.0],[987.5,159.4],[988.5,162.2],[994.1,165.1],[990.3,182.7],[989.6,192.5],[989.6,197.6],[991.7,206.6],[994.0,229.1],[994.2,244.3],[993.1,250.9],[988.6,258.8],[978.0,270.9],[972.8,278.3],[968.4,281.9],[967.8,296.7],[966.3,299.9],[963.4,304.7],[957.3,310.8],[944.4,323.4],[935.1,330.9],[923.3,336.5],[920.6,341.1],[919.9,345.2],[915.4,357.7],[915.3,372.9],[916.5,379.6],[909.4,397.3],[907.0,400.3],[904.4,401.9],[901.3,403.7],[901.5,406.0],[895.0,428.5],[887.0,450.8],[882.8,464.4],[877.9,491.0],[877.5,498.7],[878.4,501.6],[876.5,506.8],[873.6,514.7],[871.5,520.9],[870.8,524.0],[870.0,526.7],[869.1,530.9],[865.8,541.4],[865.3,555.5],[864.1,563.1],[864.1,568.1]]],"cerro_colorado":[[[-80,1210.5],[-77.0,1209.6],[-73.7,1210.2],[-67.9,1208.0],[-66.1,1207.8],[-63.0,1208.4],[-60.0,1207.5],[-55.4,1202.7],[-53.2,1198.2],[-50.1,1198.0],[-41.5,1202.9],[-26.4,1203.5],[-7.9,1206.9],[5.0,1213.4],[9.9,1214.3],[14.6,1214.4],[16.5,1214.3],[20.3,1214.1],[28.4,1214.0],[44.5,1214.1],[54.9,1214.5],[62.3,1213.8],[64.8,1213.1],[69.5,1212.1],[85.2,1209.1],[99.0,1205.8],[102.0,1205.4],[104.6,1205.4],[113.2,1202.9],[137.6,1196.6],[142.6,1195.0],[147.9,1193.0],[154.7,1189.9],[171.5,1182.7],[182.0,1178.2],[184.6,1177.6],[187.1,1177.1],[190.1,1177.4],[193.5,1177.2],[196.0,1176.2],[200.8,1175.2],[204.9,1174.4],[209.5,1174.3],[212.9,1174.4],[217.3,1176.5],[219.9,1177.2],[222.3,1176.7],[224.2,1175.5],[229.8,1169.6],[231.5,1168.1],[233.7,1166.5],[241.3,1162.9],[252.2,1157.4],[258.7,1157.7],[261.1,1157.4],[263.0,1156.1],[264.7,1152.7],[270.5,1148.7],[274.7,1145.5],[274.6,1150.6],[272.1,1156.0],[263.9,1165.4],[258.0,1175.1],[250.8,1184.3],[241.8,1197.7],[234.3,1211.6],[216.1,1234.2],[203.5,1249.4],[200.8,1258.5],[196.4,1273.9],[198.6,1275.6],[197.8,1277.6],[201.1,1279.5],[214.2,1283.1],[227.3,1288.9],[240.0,1296.3],[250.0,1303.1],[267.3,1317.6],[290.5,1313.0],[307.0,1311.2],[327.4,1308.3],[351.1,1305.5],[364.4,1303.9],[392.2,1302.1],[468.3,1295.8],[473.4,1295.4],[479.0,1294.9],[481.5,1294.7],[504.1,1293.3],[519.1,1292.0],[523.4,1291.5],[532.3,1290.6],[550.1,1289.3],[572.1,1287.0],[594.4,1285.7],[597.5,1285.1],[621.7,1283.1],[647.8,1280.8],[656.3,1280.8],[671.0,1279.8],[687.1,1278.8],[701.3,1277.5],[714.3,1276.8],[727.0,1274.9],[731.5,1275.3],[741.5,1276.5],[754.1,1284.8],[752.5,1279.3],[749.2,1269.2],[757.9,1250.8],[780.2,1233.5],[806.3,1215.9],[822.8,1206.8],[829.5,1199.2],[829.5,1187.6],[826.5,1176.0],[828.2,1164.5],[828.8,1158.6],[830.7,1154.4],[843.9,1147.8],[867.8,1136.5],[869.3,1135.0],[876.2,1133.0],[882.7,1130.7],[890.3,1127.6],[894.5,1124.7],[898.5,1118.3],[900.8,1116.1],[902.5,1115.0],[904.5,1114.5],[908.4,1114.4],[911.0,1114.1],[915.0,1115.0],[917.7,1115.2],[919.6,1115.8],[921.8,1116.6],[922.0,1111.1],[922.7,1107.0],[922.4,1093.9],[921.4,1082.2],[917.4,1066.1],[915.0,1059.9],[911.3,1054.1],[909.2,1048.7],[908.2,1043.8],[908.2,1040.5],[910.2,1031.7],[913.4,1023.8],[915.3,1008.7],[914.2,1004.2],[909.7,998.4],[905.9,982.2],[899.9,972.4],[897.6,969.5],[891.9,959.7],[891.2,957.1],[890.7,952.7],[890.4,949.5],[890.3,939.4],[896.6,917.8],[900.2,911.3],[913.0,894.2],[916.0,885.9],[916.4,882.5],[915.6,868.9],[909.4,847.0],[908.1,842.2],[904.3,831.3],[901.5,819.2],[900.7,813.1],[901.2,801.3],[896.8,769.4],[891.8,753.2],[890.3,750.2],[887.8,737.1],[888.0,725.7],[889.2,717.2],[891.6,710.8],[895.3,703.7],[896.6,699.4],[898.6,696.3],[900.5,689.8],[900.4,680.6],[897.1,667.4],[894.2,650.6],[894.5,646.0],[896.5,639.4],[899.5,631.5],[897.7,622.3],[899.2,614.6],[889.0,602.5],[882.0,592.5],[878.2,588.5],[872.2,583.7],[866.1,575.3],[864.9,572.0],[864.1,568.1],[864.1,563.1],[865.3,555.5],[865.8,541.4],[869.1,530.9],[870.0,526.7],[870.8,524.0],[871.5,520.9],[873.6,514.7],[876.5,506.8],[878.4,501.6],[877.5,498.7],[877.9,491.0],[882.8,464.4],[887.0,450.8],[895.0,428.5],[901.5,406.0],[901.3,403.7],[904.4,401.9],[907.0,400.3],[909.4,397.3],[916.5,379.6],[915.3,372.9],[915.4,357.7],[919.9,345.2],[920.6,341.1],[923.3,336.5],[935.1,330.9],[944.4,323.4],[957.3,310.8],[963.4,304.7],[966.3,299.9],[967.8,296.7],[968.4,281.9],[972.8,278.3],[978.0,270.9],[988.6,258.8],[992.4,252.2],[994.2,244.3],[994.0,229.1],[991.7,206.6],[989.8,199.0],[989.6,192.5],[990.3,182.7],[994.1,165.1],[988.5,162.2],[987.5,159.4],[990.1,150.0],[1008.7,116.8],[1009.4,100.0],[980.4,77.0],[976.5,71.2],[959.2,45.8],[959.1,40.9],[960.2,35.6],[959.9,28.5],[960.7,26.5],[959.7,23.2],[958.8,19.5],[959.6,14.6],[957.0,-1.3],[955.2,-24.1],[953.4,-34.2],[946.2,-59.5],[945.3,-61.6],[947.3,-63.3],[947.9,-65.4],[949.0,-68.3],[946.8,-76.1],[945.4,-78.7],[945.4,-80],[407.4,-80],[395.6,-63.5],[389.8,-55.8],[364.8,-1.4],[344.7,25.4],[315.2,41.1],[292.1,58.6],[281.1,71.6],[275.4,77.7],[262.8,88.5],[248.4,99.0],[242.4,105.0],[240.3,105.0],[229.9,113.6],[225.7,117.9],[223.1,119.6],[217.2,127.6],[214.2,133.1],[211.7,137.8],[208.5,147.5],[208.1,151.2],[207.5,162.0],[207.0,169.7],[205.5,177.6],[199.5,195.8],[192.9,217.6],[189.9,224.4],[185.5,231.6],[180.9,237.4],[173.0,245.1],[170.0,248.7],[157.2,262.2],[144.8,278.6],[140.4,285.7],[129.0,308.9],[114.1,334.2],[111.1,341.4],[108.7,352.4],[105.9,357.4],[94.8,371.1],[85.5,379.1],[81.5,383.7],[78.4,389.2],[72.3,402.3],[61.3,417.5],[54.5,427.9],[43.1,448.1],[37.9,459.0],[26.4,477.2],[15.8,491.3],[11.5,498.7],[8.6,504.8],[3.5,512.2],[0.9,518.4],[-2.1,523.2],[-3.0,526.4],[-10.4,543.7],[-12.1,549.8],[-13.3,557.7],[-14.6,562.3],[-14.7,567.2],[-18.6,599.0],[-21.6,613.2],[-22.1,621.8],[-23.1,626.4],[-23.2,631.0],[-23.0,639.9],[-27.3,647.0],[-28.8,653.5],[-33.2,670.6],[-39.3,684.2],[-46.4,696.7],[-59.1,715.5],[-68.5,730.8],[-72.6,740.9],[-73.8,744.1],[-78.4,759.5],[-79.8,769.8],[-79.7,777.5],[-80,780.5]]]};

    const PROJECTS = [
        { id: 'misti',    dist: 'yanahuara',      name: 'Mirador del Misti',     url: '/departamentos/proyecto-mirador',       x: 1033, y: 1106 },
        { id: 'catalina', dist: 'yanahuara',      name: 'Mirador Sta. Catalina', url: '/departamentos/mirador-santa-catalina', x: 952,  y: 1175 },
        { id: 'altamira', dist: 'cayma',          name: 'Altamira Residencial',  url: '/departamentos/proyecto-altamira',      x: 975,  y: 985  },
        { id: 'arces',    dist: 'cayma',          name: 'Residencial Los Arces', url: '/departamentos/residencial-los-arces',  x: 1002, y: 745  },
        { id: 'parque',   dist: 'cerro_colorado', name: 'Parque Real',           url: '/departamentos/proyecto-parque-real',   x: 732,  y: 955  },
        { id: 'norte',    dist: 'cerro_colorado', name: 'Residencias del Norte', url: '/departamentos/residencias-norte',      x: 585,  y: 660  }
    ];

    const DISTRICT_META = {
        yanahuara: {
            filterVal: 'yanahuara',
            label: 'Yanahuara, Arequipa',
            sub: 'Límite distrital oficial · 2 proyectos activos',
            bottomHtml: 'Proyectos en Yanahuara: <strong>Mirador del Misti</strong> · <strong>Mirador de Santa Catalina</strong>',
            cta: 'Filtrar Yanahuara →',
            cx: 955, cy: 1095, scale: 0.94
        },
        cayma: {
            filterVal: 'cayma',
            label: 'Cayma, Arequipa',
            sub: 'Límite distrital oficial · 2 proyectos activos',
            bottomHtml: 'Proyectos en Cayma: <strong>Altamira Residencial</strong> · <strong>Residencial Los Arces</strong>',
            cta: 'Filtrar Cayma →',
            cx: 1005, cy: 815, scale: 0.68
        },
        cerro_colorado: {
            filterVal: 'cerro colorado',
            label: 'Cerro Colorado, Arequipa',
            sub: 'Límite distrital oficial · 2 proyectos activos',
            bottomHtml: 'Proyectos en Cerro Colorado: <strong>Parque Real</strong> · <strong>Residencias del Norte</strong>',
            cta: 'Filtrar Cerro Colorado →',
            cx: 565, cy: 840, scale: 0.52
        }
    };

    let activeDistrict = 'yanahuara';
    let isSatellite    = false;
    let cam            = { x: 0, y: 0, scale: 0.85 };
    let animId         = null;

    const imgRoad        = document.getElementById('depasImgRoad');
    const imgSat         = document.getElementById('depasImgSat');
    const layerThumb     = document.getElementById('depasLayerThumb');
    const layerLabel     = document.getElementById('depasLayerLabel');
    const searchTitle    = document.getElementById('depasGmapTitle');
    const searchSub      = document.getElementById('depasGmapSub');
    const bottomText     = document.getElementById('depasBottomProjects');
    const bottomFilterEl = document.getElementById('depasBottomFilterBtn');
    const inactiveGroup  = document.getElementById('depasInactivePolys');
    const activeHalo     = document.getElementById('depasActiveHalo');
    const activeFill     = document.getElementById('depasActiveFill');
    const spotlightMask  = document.getElementById('depasSpotlightMask');
    const pinsGroup      = document.getElementById('depasProjectPins');

    function ringsToPath(rings) {
        return rings.map(ring =>
            ring.map((pt, idx) => (idx === 0 ? 'M' : 'L') + pt[0] + ',' + pt[1]).join(' ') + ' Z'
        ).join(' ');
    }

    function renderPolygons() {
        inactiveGroup.innerHTML = '';
        const activePath = ringsToPath(DISTRICTS_POLY[activeDistrict]);
        activeHalo.setAttribute('d', activePath);
        activeFill.setAttribute('d', activePath);

        if (isSatellite) {
            activeFill.setAttribute('fill', 'rgba(56, 189, 248, 0.20)');
            activeFill.setAttribute('stroke', '#38bdf8');
            activeHalo.setAttribute('stroke', '#0a1b3d');
            spotlightMask.setAttribute('fill', 'rgba(6, 18, 41, 0.32)');
        } else {
            activeFill.setAttribute('fill', 'rgba(8, 122, 196, 0.15)');
            activeFill.setAttribute('stroke', '#087ac4');
            activeHalo.setAttribute('stroke', '#ffffff');
            spotlightMask.setAttribute('fill', 'rgba(10, 27, 61, 0.10)');
        }

        const outerRect = 'M -200,-200 L 1736,-200 L 1736,1736 L -200,1736 Z ';
        spotlightMask.setAttribute('d', outerRect + activePath);

        Object.keys(DISTRICTS_POLY).forEach(key => {
            if (key === activeDistrict) return;
            const p = document.createElementNS('http://www.w3.org/2000/svg', 'path');
            p.setAttribute('d', ringsToPath(DISTRICTS_POLY[key]));
            p.setAttribute('fill', 'rgba(15, 23, 42, 0.01)');
            p.setAttribute('stroke', isSatellite ? 'rgba(255,255,255,0.45)' : 'rgba(100,116,139,0.55)');
            p.setAttribute('stroke-width', '2');
            p.setAttribute('stroke-dasharray', '6 5');
            p.setAttribute('class', 'depas-map-poly');
            p.addEventListener('click', (e) => {
                e.stopPropagation();
                focusDistrict(key);
            });
            inactiveGroup.appendChild(p);
        });

        renderPins();
    }

    function renderPins() {
        pinsGroup.innerHTML = '';
        const invScale = Math.max(0.75, Math.min(1.45, 0.85 / cam.scale));

        PROJECTS.forEach(proj => {
            const isCurrent = proj.dist === activeDistrict;
            const g = document.createElementNS('http://www.w3.org/2000/svg', 'g');
            g.setAttribute('transform', `translate(${proj.x}, ${proj.y}) scale(${invScale})`);
            g.style.cursor = 'pointer';

            g.addEventListener('click', (e) => {
                e.stopPropagation();
                if (isCurrent && proj.url) {
                    window.location.href = proj.url;
                } else {
                    focusDistrict(proj.dist);
                }
            });

            if (isCurrent) {
                g.innerHTML = `
                    <g filter="url(#depasPinDrop)">
                        <rect x="-72" y="-37" width="144" height="27" rx="13.5" fill="#0a1b3d" stroke="#97DEFA" stroke-width="1.5"/>
                        <text x="0" y="-19.5" text-anchor="middle" fill="#ffffff" font-size="11" font-weight="600" font-family="Kanit, sans-serif">${proj.name}</text>
                        <path d="M -5,-10 L 5,-10 L 0,-2 Z" fill="#0a1b3d"/>
                        <circle cx="0" cy="0" r="5.5" fill="#087ac4" stroke="#ffffff" stroke-width="2"/>
                    </g>
                `;
            } else {
                g.innerHTML = `<circle cx="0" cy="0" r="5" fill="#64748b" stroke="#ffffff" stroke-width="1.8" opacity="0.82"/>`;
            }
            pinsGroup.appendChild(g);
        });
    }

    function applyTransform() {
        const vw = viewport.clientWidth || 540;
        const vh = viewport.clientHeight || 440;
        const minX = vw - 1536 * cam.scale;
        const minY = vh - 1536 * cam.scale;
        cam.x = Math.min(0, Math.max(minX, cam.x));
        cam.y = Math.min(0, Math.max(minY, cam.y));
        stage.style.transform = `translate3d(${cam.x}px, ${cam.y}px, 0) scale(${cam.scale})`;
    }

    function flyTo(cx, cy, targetScale) {
        const vw = viewport.clientWidth || 540;
        const vh = viewport.clientHeight || 440;
        const minScale = Math.max(vw / 1536, vh / 1536, 0.36);
        const s = Math.max(minScale, Math.min(1.5, targetScale));

        const targetX = vw / 2 - cx * s;
        const targetY = vh / 2 - cy * s;

        const startX = cam.x, startY = cam.y, startS = cam.scale;
        const startTime = performance.now();
        const duration = 520;

        if (animId) cancelAnimationFrame(animId);

        function step(now) {
            const t = Math.min(1, (now - startTime) / duration);
            const ease = 1 - Math.pow(1 - t, 3);
            cam.scale = startS + (s - startS) * ease;
            cam.x = startX + (targetX - startX) * ease;
            cam.y = startY + (targetY - startY) * ease;
            applyTransform();
            renderPins();
            if (t < 1) {
                animId = requestAnimationFrame(step);
            }
        }
        animId = requestAnimationFrame(step);
    }

    function focusDistrict(key) {
        if (!DISTRICT_META[key]) return;
        activeDistrict = key;
        const meta = DISTRICT_META[key];

        if (searchTitle) searchTitle.textContent = meta.label;
        if (searchSub) searchSub.textContent = meta.sub;
        if (bottomText) bottomText.innerHTML = meta.bottomHtml;
        if (bottomFilterEl) bottomFilterEl.textContent = meta.cta;

        ['yanahuara', 'cayma', 'cerro_colorado'].forEach(k => {
            const card = document.getElementById('depas-dcard-' + k);
            const pill = document.getElementById('depas-dpill-' + k);
            if (card) card.classList.toggle('is-active', k === key);
            if (pill) pill.classList.toggle('is-active', k === key);
        });

        renderPolygons();
        flyTo(meta.cx, meta.cy, meta.scale);
    }

    function zoomBy(factor) {
        const vw = viewport.clientWidth || 540;
        const vh = viewport.clientHeight || 440;
        const centerMapX = (vw / 2 - cam.x) / cam.scale;
        const centerMapY = (vh / 2 - cam.y) / cam.scale;
        flyTo(centerMapX, centerMapY, cam.scale * factor);
    }

    // Eventos de botones y tarjetas
    document.querySelectorAll('[data-map-district]').forEach(el => {
        const key = el.getAttribute('data-map-district');
        el.addEventListener('click', () => focusDistrict(key));
        if (el.classList.contains('depas-distrito-box')) {
            el.addEventListener('mouseenter', () => {
                if (window.innerWidth > 992) focusDistrict(key);
            });
        }
    });

    document.getElementById('depasMapOverviewBtn')?.addEventListener('click', () => {
        flyTo(820, 890, 0.42);
    });

    document.getElementById('depasZoomIn')?.addEventListener('click', () => zoomBy(1.25));
    document.getElementById('depasZoomOut')?.addEventListener('click', () => zoomBy(0.8));

    document.getElementById('depasLayerSwitch')?.addEventListener('click', () => {
        isSatellite = !isSatellite;
        if (isSatellite && imgSat && !imgSat.getAttribute('src')) {
            imgSat.setAttribute('src', imgSat.getAttribute('data-src'));
        }
        if (imgRoad) imgRoad.style.display = isSatellite ? 'none' : 'block';
        if (imgSat) imgSat.style.display = isSatellite ? 'block' : 'none';
        if (layerThumb) {
            layerThumb.src = isSatellite ? '/img/sections/gmap-road-thumb.webp' : '/img/sections/gmap-sat-thumb.webp';
        }
        if (layerLabel) layerLabel.textContent = isSatellite ? 'Mapa' : 'Satélite';
        renderPolygons();
    });

    // Conectar el botón inferior "Filtrar [Distrito] ->" con los filtros reales del catálogo superior
    bottomFilterEl?.addEventListener('click', () => {
        const meta = DISTRICT_META[activeDistrict];
        const filterDistrito = document.getElementById('filter-distrito');
        const filterEtapa    = document.getElementById('filter-etapa');
        const filterDorm     = document.getElementById('filter-dorm');

        if (filterDistrito) filterDistrito.value = meta.filterVal;
        if (filterEtapa) filterEtapa.value = 'todas';
        if (filterDorm) filterDorm.value = '';
        if (typeof window.applyFilters === 'function') {
            window.applyFilters();
        }
        document.querySelector('.catalog-section')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });

    // Arrastre libre con puntero (mouse / touch)
    let isDragging = false, dragStartX = 0, dragStartY = 0, camStartX = 0, camStartY = 0;

    viewport.addEventListener('pointerdown', (e) => {
        if (e.target.closest('button') || e.target.closest('.depas-gmap-ctrl')) return;
        if (animId) cancelAnimationFrame(animId);
        isDragging = true;
        dragStartX = e.clientX;
        dragStartY = e.clientY;
        camStartX  = cam.x;
        camStartY  = cam.y;
        viewport.setPointerCapture(e.pointerId);
    });

    viewport.addEventListener('pointermove', (e) => {
        if (!isDragging) return;
        cam.x = camStartX + (e.clientX - dragStartX);
        cam.y = camStartY + (e.clientY - dragStartY);
        applyTransform();
    });

    viewport.addEventListener('pointerup', () => { isDragging = false; });
    viewport.addEventListener('pointercancel', () => { isDragging = false; });

    window.addEventListener('resize', () => applyTransform());

    // Inicializar mapa cuando entra en pantalla o tras carga inicial
    focusDistrict('yanahuara');
})();


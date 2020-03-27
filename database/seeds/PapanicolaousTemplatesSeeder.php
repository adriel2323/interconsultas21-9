<?php

use Illuminate\Database\Seeder;
use \App\Models\pathologicalAnatomy\PapanicolaousTemplate;

class PapanicolaousTemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * TITULO
         * Código 1
         */
        PapanicolaousTemplate::create([
            'category' => 1,
            'description' => '1 - PAPANICOLAOU CERVICAL'
        ]);
        PapanicolaousTemplate::create([
            'category' => 1,
            'description' => '2 - PAPANICOLAOU ENDOCERVICAL'
        ]);
        PapanicolaousTemplate::create([
            'category' => 1,
            'description' => '3 - PAPANICOLAOU EXOCERVICAL'
        ]);
        PapanicolaousTemplate::create([
            'category' => 1,
            'description' => '5 - CEPILLADO ENDOCERVICAL'
        ]);
        PapanicolaousTemplate::create([
            'category' => 1,
            'description' => '6 - PAPANICOLAOU EXOCERVICAL Y ENDOCERVICAL'
        ]);
        PapanicolaousTemplate::create([
            'category' => 1,
            'description' => '7 - SECRECIÓN POR PEZÓN MAMA DERECHA'
        ]);
        PapanicolaousTemplate::create([
            'category' => 1,
            'description' => '8 - SECRECIÓN DE PEZÓN'
        ]);
        PapanicolaousTemplate::create([
            'category' => 1,
            'description' => '9 - PAPANICOLAOU VULVAR'
        ]);
        PapanicolaousTemplate::create([
            'category' => 1,
            'description' => '10 - SECRECIÓN DE PEZÓN MAMA IZQUIERDA'
        ]);
        PapanicolaousTemplate::create([
            'category' => 1,
            'description' => '11 - PAPANICOLAOU CERVICO VAGINAL'
        ]);
        PapanicolaousTemplate::create([
            'category' => 1,
            'description' => '12 - PAPANICOLAOU VAGINAL'
        ]);
        PapanicolaousTemplate::create([
            'category' => 1,
            'description' => '13 - PAPANICOLAOU DE CUPULA VAGINAL'
        ]);

        /**
         * TROFISMO
         * CÓDIGO 2
         */
        PapanicolaousTemplate::create([
            'category' => 2,
            'description' => '1 - TROFISMO NORMAL'
        ]);
        PapanicolaousTemplate::create([
            'category' => 2,
            'description' => '2 - TROFISMO DISMINUÍDO'
        ]);
        PapanicolaousTemplate::create([
            'category' => 2,
            'description' => '3 - TROFISMO AUMENTADO'
        ]);
        PapanicolaousTemplate::create([
            'category' => 2,
            'description' => '4 - ATRÓFICO'
        ]);
        PapanicolaousTemplate::create([
            'category' => 2,
            'description' => '5 - TRÓFICO'
        ]);

        /**
         * CEL. EXOCERVICAL
         * CÓDIGO 3
         */
        PapanicolaousTemplate::create([
            'category' => 3,
            'description' => '1 - CÉLULAS EXOCERVICALES BASALES'
        ]);
        PapanicolaousTemplate::create([
            'category' => 3,
            'description' => '2 - CÉLULAS EXOCERVICALES BASALES Y PARABASALES'
        ]);
        PapanicolaousTemplate::create([
            'category' => 3,
            'description' => '3 -CÉLULAS EXOCERVICALES PARABASALES E INTERMEDIAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 3,
            'description' => '4 -CÉLULAS EXOCERVICALES INTERMEDIAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 3,
            'description' => '5 - CÉLULAS EXOCERVICALES INTERMEDIAS Y SUPERFICIALES'
        ]);
        PapanicolaousTemplate::create([
            'category' => 3,
            'description' => '6 - CÉLULAS EXOCERVICALES SUPERFICIALES'
        ]);
        PapanicolaousTemplate::create([
            'category' => 3,
            'description' => '7 - CÉLULAS PAVIMENTOSAS PARABASALES'
        ]);
        PapanicolaousTemplate::create([
            'category' => 3,
            'description' => '8 - CÉLULAS PAVIMENTOSAS PARABASALES INTERMEDIAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 3,
            'description' => '9 - CÉLULAS PAVIMENTOSAS INTERMEDIAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 3,
            'description' => '10 - CÉLULAS PAVIMENTOSAS INTERMEDIAS Y SUPERFICIALES'
        ]);
        PapanicolaousTemplate::create([
            'category' => 3,
            'description' => '11 - CÉLULAS PAVIMENTOSAS SUPERFICIALES'
        ]);
        PapanicolaousTemplate::create([
            'category' => 3,
            'description' => '12 - CÉLULAS EXOCERVICALES PARABASAL'
        ]);
        PapanicolaousTemplate::create([
            'category' => 3,
            'description' => '13 - CÉLULAS EXOCERVICALES PARABASALES, INTERMEDIAS Y SUPERFICIALES'
        ]);
        PapanicolaousTemplate::create([
            'category' => 3,
            'description' => '14 - CÉLULAS PAVIMENTOSAS BASALES Y PARABASALES'
        ]);
        PapanicolaousTemplate::create([
            'category' => 3,
            'description' => '15 - CÉLULAS EXOCERVICALES BASALES, PARABASALES E INTERMEDIAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 3,
            'description' => '16 - CÉLULAS PAVIMENTOSAS PARABASALES, INTERMEDIAS Y SUPERFICIALES'
        ]);
        PapanicolaousTemplate::create([
            'category' => 3,
            'description' => '17 - CÉLULAS PAVIMENTOSAS BASALES, PARABASALES E INTERMEDIAS'
        ]);

        /**
         * CEL. ENDOCERVICAL
         * CÓDIGO 4
         */
        PapanicolaousTemplate::create([
            'category' => 4,
            'description' => '1 - AUSENCIA DE CÉLULAS ENDOCERVICALES'
        ]);
        PapanicolaousTemplate::create([
            'category' => 4,
            'description' => '2 - CÉLULAS ENDOCERVICALES ESCASAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 4,
            'description' => '3 - CELULAS ENDOCERVICALES EN MODERADO NÚMERO'
        ]);
        PapanicolaousTemplate::create([
            'category' => 4,
            'description' => '4 - CÉLULAS ENDOCERVICALES NUMEROSAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 4,
            'description' => '5 - PRESENCIA DE MOCO ENDOCERVICAL SIN CÉLULAS EPITELIALES CILÍNDRICAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 4,
            'description' => '6 - PRESENCIA DE MOCO Y ESCASAS CÉLULAS ENDOCERVICALES'
        ]);

        /**
         * CEL. METAPLÁSICAS
         * CÓDIGO 5
         */

        PapanicolaousTemplate::create([
            'category' => 5,
            'description' => '1 - CÉLULAS METAPLÁSICAS ESCASAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 5,
            'description' => '2 - CÉLULAS METAPLÁSICAS EN MODERADA CANTIDAD'
        ]);
        PapanicolaousTemplate::create([
            'category' => 5,
            'description' => '3 - ABUNDANTES CÉLULAS METAPLÁSICAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 5,
            'description' => '4 - PRESENCIA DE CÉLULAS METAPLÁSICAS PAVIMENTOSAS'
        ]);

        /**
         * CEL. ENDOMETRALES
         * CÓDIGO 6
         */
        PapanicolaousTemplate::create([
            'category' => 6,
            'description' => '1 - PRESENCIA DE CÉLULAS ENDOMETRALES'
        ]);
        PapanicolaousTemplate::create([
            'category' => 6,
            'description' => '2 - PRESENCIA DE CÉLULAS ENDOMETRALES HIPERPLÁSICAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 6,
            'description' => '3 - PRESENCIA DE CÉLULAS ENDOMETRALES ATÍPICAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 6,
            'description' => '4 - CÉLULAS ENDOMETRALES CON ALTERACIÓN POR DIU'
        ]);
        PapanicolaousTemplate::create([
            'category' => 6,
            'description' => '6 - CÉLULAS ENDOMETRALES DECIDUALIZADAS'
        ]);

        /**
         * LPN
         * CÓDIGO 7
         */
        PapanicolaousTemplate::create([
            'category' => 7,
            'description' => '1 - LEUCOCITOS POLIMORFONUCLEARES ESCASOS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 7,
            'description' => '2 - REGULAR CANTIDAD DE LEUCOCITOS POLIMORFONUCLEARES'
        ]);
        PapanicolaousTemplate::create([
            'category' => 7,
            'description' => '3 - LEUCOCITOS POLIMORFONUCLEARES ABUNDANTES'
        ]);
        PapanicolaousTemplate::create([
            'category' => 7,
            'description' => '4 - NAPAS DE LEUCOCITOS POLIMORFONUCLEARES'
        ]);

        /**
         * HEMATÍES
         * CÓDIGO 8
         */
        PapanicolaousTemplate::create([
            'category' => 8,
            'description' => '1 - HEMATÍES ESCASOS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 8,
            'description' => '2 - MODERADO NÚMERO DE HEMATÍES'
        ]);
        PapanicolaousTemplate::create([
            'category' => 8,
            'description' => '3 - HEMATÍES NUMEROSOS'
        ]);

        /**
         * HISTIOCITOS
         * CÓDIGO 9
         */
        PapanicolaousTemplate::create([
            'category' => 9,
            'description' => '1 - HISTIOCITOS ESCASOS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 9,
            'description' => '2 - HISTIOCITOS EN MODERADA CANTIDAD'
        ]);
        PapanicolaousTemplate::create([
            'category' => 9,
            'description' => '3 - HISTIOCITOS ABUNDANTES'
        ]);

        /**
         * FLORA
         * CÓDIGO 10
         */
        PapanicolaousTemplate::create([
            'category' => 10,
            'description' => '1 - FLORA BACILAR'
        ]);
        PapanicolaousTemplate::create([
            'category' => 10,
            'description' => '2 - FLORA COCOIDE'
        ]);
        PapanicolaousTemplate::create([
            'category' => 10,
            'description' => '3 - FLORA BACTERIANA MIXTA'
        ]);

        /**
         * FLORA ESPECIFI.
         * CÓDIGO 11
         */
        PapanicolaousTemplate::create([
            'category' => 11,
            'description' => '1 - PRESENCIA DE MICROORGANISMOS COMPATIBLES CON MONILIAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 11,
            'description' => '2 - PRESENCIA DE MICROORGANISMOS COMPATIBLES CON TRICHOMONAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 11,
            'description' => '3 - PRESENCIA DE ESPORAS MICÓTICAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 11,
            'description' => '4 - PRESENCIA DE HIFAS MICÓTICAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 11,
            'description' => '5 - PRESENCIA DE MICROORGANISMOS COMPATIBLES CON GARDNERELLA VAGI'
        ]);
        PapanicolaousTemplate::create([
            'category' => 11,
            'description' => '6 - PRESENCIA DE MICROORGANISMOS COMPATIBLES CON LEPTOTRIX'
        ]);
        PapanicolaousTemplate::create([
            'category' => 11,
            'description' => '7 - PRESENCIA DE MICROORGANISMOS COMPATIBLES CON CLAMYDIA TRACOMATIS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 11,
            'description' => '8 - PRESENCIA DE ALTERACIONES COMPATIBLES CON HERPES VIRUS 2'
        ]);
        PapanicolaousTemplate::create([
            'category' => 11,
            'description' => '9 - PRESENCIA DE MICROORGANISMOS COMPATIBLES CON ACTINOMYCES ISRAELII'
        ]);

        /**
         * NOTAS
         * CÓDIGO 12
         */
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '1- ALTERACIONES CELULARES POR INFLAMACIÓN'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '2- ALTERACIONES CELULARES POR CITÓLISIS TRAUMÁTICA'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '3- ALTERACIONES CELULARES POR CITÓLISIS POR FLORA BACTERIANA'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '4- ALTERACIONES CELULARES POR REGENERACIÓN'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '5- ALTERACIONES CELULARES POR DÉFICIT DE TROFISMO'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '6- MUESTRA NO REPRESENTATIVA POR BAJO NÚMERO DE CELULAS CERVICALES'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '7- MUESTRA NO REPRESENTATIVA POR MARCADA LISIS TRAUMÁTICA'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '8- MUESTRA NO REPRESENTATIVA POR POR EXCESIVA CANTIDAD DE SANGRE'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '9- MUESTRA NO REPRESENTATIVA POR NAPAS DE EXUDADOS LEUCOCITARIOS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '10- MUESTRA NO REPRESENTATIVA POR AUTÓLISIS POR FIJACIÓN DEFICIENTE'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '11- SE SOLICITA REPETIR EL EXÁMEN'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '12- SE OBSERVAN CÉLULAS PAVIMENTOSAS CON LIGERO AGRANDAMIENTO NUCL'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '13- SE OBSERVA CÉLULAS METAPLÁSICAS ACTIVAS, ALGUNAS CON AGRANDAMIENTO'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '14- BAJO NÚMERO DE CÉLULAS CON CAMBIOS DISPLÁSICOS LEVES EN UN MEDIO'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '15- BAJO NÚMERO DE COILOCITOS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '16- PRESENCIA DE CÉLULAS ENDOCERVICALES ACTIVAS. REQUERIRÁ CONTROLES PARA'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '17- PROFUNDOS CAMBIOS INFLAMATORIOS. SE SOLICITA CORREGIR LA INFLAMACIÓN'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '18- CAMBIOS INFLAMATORIOS Y REGENERATIVOS INTENSOS. REQUERIRÁ CORREGIR'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '19- PRESENCIA DE CÉLULAS ENDOMETRALES ACTIVAS. SE SUGIERE EFECTUAR EVA'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '20- LA INFECCIÓN POR HERPES VIRUS 2 INDICA LA NECESIDAD DE CONTROLES'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '21- SE OBSERVAN CAMBIOS DISPLÁSICOS LEVES'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '22- SE OBSERVAN CAMBIOS DISPLÁSICOS LEVES Y MODERADOS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '23- SE OBSERVAN CAMBIOS DISPLÁSICOS MODERADOS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '24- SE OBSERVAN CÉLULAS METAPLÁSICAS ATÍPICAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '25- SE OBSERVAN CAMBIOS DISPLÁSICOS LEVES EN CÉLULAS EXOCERVICALES Y'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '26- SE OBSERVAN CAMBIOS DISPLÁSICOS LEVES Y MODERADOS. SE VEN CÉLULAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '27- SE OBSERVAN CÉLULAS CON CAMBIOS DISPLÁSICOS MODERADOS E INTENSOS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '28- SE OBSERVAN CÉLULAS CON CAMBIOS DISPLÁSICOS INTENSOS Y ELEMENTOS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '29- SE OBSERVAN CÉLULAS PAVIMENTOSAS DE CARACTERES NEOPLÁSICOS, DE NU'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '30- TROFISMO AUMENTADO'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '31- PRESENCIA DE CÉLULAS ENDOMETRALES ACTIVAS, HIPERPLÁSICAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '32- PRESENCIA DE CÉLULAS ENDOMETRALES ATÍPICAS, EN PEQUEÑOS GRUPOS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '33- FONDO DE ASPECTO NECRÓTICO. PRESENCIA DE AISLADAS CÉLULAS DE CARAC'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '34- FONDO DE TIPO NECRÓTICO. PRESENCIA DE AISLADAS CÉLULAS DE CARACTER'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '35- SE OBSERVAN NÚMEROSOS COILOCITOS, INDICADORES DE LESIÓN POR VIRUS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '36- CAMBIOS PARAQUERATÓSICOS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '37- CÉLULAS QUERATINIZADAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '38- CÉLULAS ENDOCERVICALES ATÍPICAS, DE NÚCLEOS GRANDES, HIPERCROMÁTI'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '39- PRESENCIA DE CÉLULAS ATÍPICAS GLANDULARES, PROBABLEMENTE ENDOCER'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '40- PRESENCIA DE ELEMENTOS DISQUERATÓSICOS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '45- MATERIAL PROTEINÁCEO'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '46- PRESENCIA DE HEMATÍES, LINFOCITOS, Y LEUCOCITOS POLIMORFONUCLEARES'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '47- ESCASAS CÉLULAS EPITELIALES DUCTALES'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '48- BAJO NÚMERO DE CÉLULAS HISTIOCITARIAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '49- PRESENCIA DE UN ÚNICO COLGAJO COHESIVO DE CÉLULAS DUCTALES CON '
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '50- PRESENCIA DE ESCASOS COLGAJOS DE CÉLULAS DUCTALES, DE NÚCLEOS MO'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '51- ABUNDANTES CÉLULAS VACUOLADAS, DISPUESTAS EN FORMA AISLADA'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '52- MODERADO NÚMERO DE CÉLULAS VACUOLADAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '53- ABUNDANTES CÉLULAS VACUOLADAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '54- PRESENCIA DE CÉLULAS PAVIMENTOSAS CON LIGERO AGRANDAMIENTO NUCLEAR'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '55- CÉLULAS PAVIMENTOSAS CON MODERADO AGRANDAMIENTO NUCLEAR ATRIB'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '56- PRESENCIA DE CÉLULAS PAVIMENTOSAS CON LIGERO AGRANDAMIENTO NUCLEAR'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '57- ABUNDANTES ESCAMAS CÓRNEAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '58- PRESENCIA DE ESCASOS COLGAJOS ANÓMALOS DE CÉLULAS ENDOCERVICALES'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '59- SE SOLICITA CONTROL SEMESTRAL'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '60- SE SOLICITA CONTROL SEMESTRAL, CON TOMAS SELECTIVAS DE ENDOCERVIX'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '61- PRESENCIA DE COILOCITOS, INDICADORES DE INFECCIÓN POR VIRUS PAPILO'
        ]);
        PapanicolaousTemplate::create([
            'category' => 12,
            'description' => '62- SE OBSERVAN CÉLULAS METAPLÁSICAS CON CAMBIOS DISPLÁSICOS DE GRADO'
        ]);

        /**
         * DIÁGNOSTICO
         * CÓDIGO 13
         */
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '1- PAPANICOLAOU NEGATIVO'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '2- CITOLOGÍA COMPATIBLE CON CERVICOPATÍA'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '3- CERVICOPATÍA POR VIRUS PAPILOMA'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '4- CERVICOPATÍA POR VIRUS PAPILOMA'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '5- CIN 1 - SIL DE BAJO GRADO'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '6- CIN 2 - SIL DE ALTO GRADO'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '7- CIN 3 - SIL DE ALTO GRADO'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '8- CIN 4 - SIL DE BAJO GRADO'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '9- CIS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '10- CIS. DESCARTAR MICROINVASIÓN'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '11-  CERVICOPATÍA POR VIRUS PAPILOMA CON CIN 2'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '12- CERVICOPATÍA POR HERPES VIRUS 2'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '13- CARCINOMA EPIDERMOIDE INVASOR DE'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '14- CITOLOGÍA COMPATIBLE CON NEOPLASI'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '15- CITOLOGÍA NEGATIVA PARA CERVIX. COMI'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '16- CITOLOGÍA NEGATIVA PARA CERVIX. COMI'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '17- ADENOCARCINOMA ENDOMETRAL'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '18- NEGATIVO PARAQUERATOSIS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '19- NEGATIVO QUERATOSIS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '20- NOTA: CAMBIOS REGENERATIVOS INTENSOS. RE'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '21- NOTA: MARCADA LISIS CELULAR. MUESTRA NO REP'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '22- NOTA: MUESTRA POCO REPRESENTATIVA. SE SOL'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '23- NOTA: INTENSOS CAMBIOS INFLAMATORIOS INDUC'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '24- NOTA: CAMBIOS POR DÉFICIT DE TROFISMO. SE SO'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '25- NOTA: ALTERACIONES NUCLEARES EN UN EXTENDI'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '26- NOTA: SE SOLICITA EFECTUAR CONTROL CITOLÓGICO S'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '27- NOTA: SE SOLICITA INVESTIGAR LESIÓN PRECURSORA'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '28- EXTENDIDO HIPOTRÓFICO. SE SUGIERE MEJ'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '29- CITOLOGÍA NEGATIVA'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '30- CELULAS PAVIMENTOSAS CON LIGERO A'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '31- CELULAS PAVIMENTOSAS CON LIGERO A'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '32- CELULAS PAVIMENTOSAS METAPLÁSICA'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '33- CELULAS PAVIMENTOSAS CON LIGERO A'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '34- CITOLOGÍA NEGATIVA PARA CÉLULAS NEO'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '35- CITOLOGÍA CERVICAL NEGATIVA'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '36- ESCASAS CÉLULAS PAVIMENTOSAS CON'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '37- EN LA PRESENTE MUESTRA NO SE OBSERVAN CÉLULAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '38- EN LA PRESENTE MUESTRA NO SE OBSERVAN SIGNOS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '39- EN LA PRESENTE MUESTRA NO SE OBSERVAN SIGNOS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '40- CÉLULAS PAVIMENTOSAS Y CILÍNDRICAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '41- CUADRO CITOLÓGICO DE CARCINOMA'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '42- CÉLULAS METAPLÁSICAS Y PAVIMENTOS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '43- CUADRO CITOLÓGICO COMPATIBLE CON '
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '44- NEGATIVO PARA CÉLULAS NEOPLÁSICAS'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '45- CERVICOPATÍA POR VIRUS PAPILOMA (V'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '46- PRESENCIA DE ELEMENTOS DISQUERATO'
        ]);
        PapanicolaousTemplate::create([
            'category' => 13,
            'description' => '47- NEGATIVO PARA CÉLULAS ATÍPICAS'
        ]);
    }
}

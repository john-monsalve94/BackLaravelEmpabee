<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

class ReportStatus extends Enum {

    const ALERTA = 'Alerta';
    const ADVERTENCIA = 'Advertencia';
    const INFO = 'Info';
    const NORMAL = 'Normal';

}
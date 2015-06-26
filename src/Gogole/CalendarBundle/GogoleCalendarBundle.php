<?php

namespace Gogole\CalendarBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class GogoleCalendarBundle extends Bundle
{
	public function getParent()
	{
        return 'BladeTesterCalendarBundle';
	}
}

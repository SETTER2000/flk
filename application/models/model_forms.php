<?php

class Model_Forms extends Model
{

	public function get_data()
	{

		// Здесь мы просто сэмулируем реальные данные.

		return array(

			array(
				'user' => 'Ваня Пупкин',
				'email' => 'op@jn.lk',
				'task' => 'Промо-сайт темного пива Dunkel от немецкого производителя Löwenbraü выпускаемого в России пивоваренной компанией "CАН ИнБев".',
				'pic'=>'/images/1.jpg'
			)

		);
	}

}

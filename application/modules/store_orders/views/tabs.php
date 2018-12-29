<ul class="nav nav-tabs  m-tabs-line m-tabs-line--2x m-tabs-line--success" role="tablist">
	<li class="nav-item m-tabs__item">
		<a class="nav-link m-tabs__link <?= ($this->uri->segment(2) == 'view') ? 'active' : '' ?>" href="<?= base_url() ?>store_orders/view/<?= $update_id ?>" >
			Dashboard
		</a>
	</li>
	<li class="nav-item m-tabs__item">
		<a class="nav-link m-tabs__link <?= ($this->uri->segment(2) == 'task') ? 'active' : '' ?>" href="<?= base_url() ?>store_orders/task/<?= $update_id ?>">
			Task
		</a>
	</li>
	<li class="nav-item m-tabs__item">
		<a class="nav-link m-tabs__link <?= ($this->uri->segment(2) == 'chats') ? 'active' : '' ?>" href="<?= base_url() ?>store_orders/chats/<?= $update_id ?>">
			Chats
		</a>
	</li>
	<li class="nav-item m-tabs__item">
		<a class="nav-link m-tabs__link <?= ($this->uri->segment(2) == 'materi') ? 'active' : '' ?>" href="<?= base_url() ?>store_orders/materi/<?= $update_id ?>">
			Materi
		</a>
	</li>
	<li class="nav-item m-tabs__item">
		<a class="nav-link m-tabs__link <?= ($this->uri->segment(2) == 'complains') ? 'active' : '' ?>" href="<?= base_url() ?>store_orders/complains/<?= $update_id ?>">
			Komplain
		</a>
	</li>
	<li class="nav-item m-tabs__item">
		<a class="nav-link m-tabs__link <?= ($this->uri->segment(2) == 'report') ? 'active' : '' ?>" href="<?= base_url() ?>store_orders/report/<?= $update_id ?>">
			Laporan
		</a>
	</li>
	<li class="nav-item m-tabs__item">
		<a class="nav-link m-tabs__link <?= ($this->uri->segment(2) == 'ulasan') ? 'active' : '' ?>" href="<?= base_url() ?>store_orders/ulasan/<?= $update_id ?>">
			Ulasan
		</a>
	</li>
	<li class="nav-item m-tabs__item ">
		<a class="nav-link m-tabs__link <?= ($this->uri->segment(2) == 'invoice') ? 'active' : '' ?>" href="<?= base_url() ?>store_orders/invoice/<?= $update_id ?>">
			Invoice
		</a>
	</li>
	<li class="nav-item m-tabs__item ">
		<a class="nav-link m-tabs__link <?= ($this->uri->segment(2) == 'penilaian') ? 'active' : '' ?>" href="<?= base_url() ?>store_orders/penilaian/<?= $update_id ?>">
			Penilaian
		</a>
	</li>
</ul>
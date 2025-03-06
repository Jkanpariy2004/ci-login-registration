<div class="card p-3 m-5">
	<div class="text-center">
		<h3>Update Mail Template</h3>
	</div>
	<form action="<?php echo base_url('mailtemplete/update/' . $templete->id) ?>" method="POST">
		<div class="mb-3">
			<label for="key">Mail Key</label>
			<input class="form-control" type="text" name="key" id="key" placeholder="Enter Mail Key" value="<?php echo $templete->key; ?>">
			<div class="is-invalid">
				<?php echo form_error('key'); ?>
			</div>
		</div>
		<div class="mb-3">
			<label for="title">Mail Title</label>
			<input class="form-control" type="text" name="title" id="title" placeholder="Enter Mail Title" value="<?php echo $templete->title; ?>">
			<div class="is-invalid">
				<?php echo form_error('title'); ?>
			</div>
		</div>
		<div class="mb-3">
			<label for="subject">Mail Subject</label>
			<input class="form-control" type="text" name="subject" id="subject" placeholder="Enter Mail Subject" value="<?php echo $templete->subject; ?>">
			<div class="is-invalid">
				<?php echo form_error('subject'); ?>
			</div>
		</div>
		<div class="mb-3">
			<label for="content">Mail Content</label>
			<textarea class="form-control" name="content" id="content" placeholder="Enter Mail Content"><?php echo $templete->content; ?></textarea>
			<div class="is-invalid">
				<?php echo form_error('content'); ?>
			</div>
		</div>
		<div class="mb-3">
			<button class="btn btn-primary w-100" type="submit">Submit</button>
		</div>
	</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector: '#content',
		height: 300,
		plugins: 'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste code help wordcount',
		toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
	});
</script>

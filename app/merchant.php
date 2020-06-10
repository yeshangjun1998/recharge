<?php 
	use App\Models\Merchant;
	function merchant($id)
	{
		$merchant = Merchant::where('id',$id)->first();
		return $merchant;
	}

 ?>
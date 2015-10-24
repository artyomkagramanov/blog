<?php 
namespace App\Services;
use App\Contracts\CategoryInterface;
use App\Models\Category;
use Illuminate\Contracts\Auth\Guard;


class CategoryService implements CategoryInterface
{
	protected $category;
	protected $user;

	public function __construct(Category $category,Guard $auth){
		$this->category = $category;
		$this->user = $auth;
	}

	public function getAll()
	{
		return $this->category->where('user_id', $this->user->id())->get();
	}

	public function show($id)
	{
		return $this->category->find($id);
	}

	public function delete($id)
	{
		$this->category->find($id)->posts()->detach();
		 return $this->category
			->where('id', '=', $id)
			->where('user_id',$this->user->id())
			->delete();
	}

	public function update($inputs,$id)
	{
		return $this->category
			->where('id', $id)
			->where('user_id',$this->user->id())
            ->update($this->secureData($inputs));
	}

	public function create($inputs)
	{	
		
		return $this->category
			->insert($this->secureData($inputs));
	}

	private function secureData($data){
		$data2=array('name' => $data['name'],'user_id'=>$this->user->id() );
		return $data2;
	}


} 


<?php 
namespace App\Services;
use App\Contracts\PostInterface;
use App\Models\Post;
use Illuminate\Contracts\Auth\Guard;

class PostService implements PostInterface
{
	protected $post;
	protected $user;

	public function __construct(Post $post,Guard $auth){
		$this->post = $post;
		$this->user = $auth;
	}

	public function getAll()
	{
		return $this->post->where('user_id', $this->user->id())->get();
	}

	public function show($id)
	{
		
	}

	public function delete($id)
	{
		
	}

	public function update($inputs,$id)
	{

	}

	public function create($request)
	{	
		$image="default.jpg";
		$inputs = $this->secureData($request->all());
		
		if( $request->hasFile('post_image') )
		{
        	$file = $request->file('post_image');
        	$image = $file->getClientOriginalName();
        	$file->move('images',$image);
        }

        $inputs = $this->secureData($request->all());
        $inputs['image'] = $image;
        $id=$this->post
			->insert($inputs);
			$this->post->find($id)->categories()->attach([1,4,7]);
			return $res;

	}

	private function secureData($data)
	{
		$data2=array('title' => $data['title'],'user_id'=>$this->user->id(),"description" => $data['description']  );
		return $data2;
	}
} 


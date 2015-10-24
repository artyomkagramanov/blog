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
		return $this->post->find($id);
	}

	public function delete($id)
	{
		$this->post->find($id)->categories()->detach();

		return $this->post
			->where('id', '=', $id)
			->where('user_id',$this->user->id())
			->delete();
	}

	public function update($request,$id)
	{

		$image = $this->post->find($id)->image;
		$data = $request->all();
		if( $request->hasFile('post_image') )
		{
        	$file = $request->file('post_image');
        	unlink(realpath('images').'\\'.$image);
        	$image = time().$file->getClientOriginalName();
        	//dd(realpath('images'));
        	
        	//File::delete('/images/'.$image);
        	$file->move('images',$image);
        }

        $inputs = $this->secureData($data);
        $inputs['image'] = $image;
        $result = $this->post
			->where('id', $id)
			->where('user_id',$this->user->id())
            ->update($inputs);
        if($result)
        {	
        	$ids = array();
			foreach ($data as $key => $value) 
			{
				if(strpos($key,'category_') !== false)
				{
					$ids[] = $value;
				}
			}
        	$post=$this->post->find($id);
        	$post->categories()->detach();
        	$post->categories()->attach($ids);
        	return $result;
        }
        else return $result;
	}

	public function create($request)
	{	
		$image="default.jpg";
		$data = $request->all();


		
		if( $request->hasFile('post_image') )
		{
        	$file = $request->file('post_image');
        	$image = time().$file->getClientOriginalName();
        	$file->move('images',$image);
        }

        $inputs = $this->secureData($data);
        $inputs['image'] = $image;
        $id=$this->post
			->insertGetId($inputs);
		if($id)
		{
			// if ok do this block and return last inserted id
			$ids = array();
			foreach ($data as $key => $value) 
			{
				if(strpos($key,'category_') !== false)
				{
					$ids[] = $value;
				}
			}
			//dd($ids);
			$this->post->find($id)->categories()->attach($ids);
			return $id;	
		}
		else
		{
			// if bad return NULL
			return $id;
		}
			

	}

	private function secureData($data)
	{
		$data2=array('title' => $data['title'],'user_id'=>$this->user->id(),"description" => $data['description']  );
		return $data2;
	}
} 


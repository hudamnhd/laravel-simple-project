 @if (Session::has('error'))
     <div class="message fixed relative top-0 mx-auto my-1.5 max-w-md rounded-md border border-green-400 bg-green-100 px-4 py-2.5 text-green-700"
         role="alert">
         <strong class="font-bold">Error!</strong>
         <span class="block sm:inline">{{ Session::get('error') }}</span>
         <span class="absolute bottom-0 right-0 top-0 hidden px-4 py-3">
             <svg class="h-6 w-6 fill-current text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 20 20">
                 <title>Close</title>
                 <path
                     d="M14.348 14.849c-.209.207-.49.327-.788.327s-.58-.12-.788-.327l-2.56-2.56-2.56 2.56c-.208.207-.49.327-.788.327s-.58-.12-.788-.327a.998.998 0 0 1 0-1.415l2.56-2.56-2.56-2.56a.997.997 0 0 1 0-1.415c.208-.208.49-.328.788-.328s.58.12.788.328l2.56 2.56 2.56-2.56c.208-.208.49-.328.788-.328s.58.12.788.328c.209.207.329.49.329.788s-.12.58-.329.788l-2.56 2.56 2.56 2.56c.209.207.329.49.329.788s-.12.58-.329.788z" />
             </svg>
         </span>
     </div>
 @endif

 @if (Session::has('success'))
     <div class="message fixed relative top-0 mx-auto my-1.5 max-w-md rounded-md border border-green-400 bg-green-100 px-4 py-2.5 text-green-700"
         role="alert">
         <strong class="font-bold">Success </strong>
         <span class="block sm:inline">{{ Session::get('success') }}</span>
         <span class="absolute bottom-0 right-0 top-0 hidden px-4 py-3">
             <svg class="h-6 w-6 fill-current text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 20 20">
                 <title>Close</title>
                 <path
                     d="M14.348 14.849c-.209.207-.49.327-.788.327s-.58-.12-.788-.327l-2.56-2.56-2.56 2.56c-.208.207-.49.327-.788.327s-.58-.12-.788-.327a.998.998 0 0 1 0-1.415l2.56-2.56-2.56-2.56a.997.997 0 0 1 0-1.415c.208-.208.49-.328.788-.328s.58.12.788.328l2.56 2.56 2.56-2.56c.208-.208.49-.328.788-.328s.58.12.788.328c.209.207.329.49.329.788s-.12.58-.329.788l-2.56 2.56 2.56 2.56c.209.207.329.49.329.788s-.12.58-.329.788z" />
             </svg>
         </span>
     </div>
 @endif

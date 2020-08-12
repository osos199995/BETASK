<body>

<div>
   monthly payroll
</div>

<div>
    salart: {{ $request->salary  }}
</div>
<div>
    bonous: {{ $request->bonous  }}
</div>
<div>
    total: {{ $request->bonous + $request->salary}}
</div>
</body>
